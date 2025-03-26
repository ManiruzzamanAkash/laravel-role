<?php

declare(strict_types=1);

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index(): Renderable
    {
        $this->checkAuthorization(auth()->user(), ['user.view']);

        // Search functionality
        $query = User::query();
        $search = request()->input('search');
        if ($search) {
            $query->where('name', 'like', "%{$search}%")
                ->orWhere('username', 'like', "%{$search}%")
                ->orWhere('email', 'like', "%{$search}%");
        }

        return view('backend.pages.users.index', [
            'users' => $query->latest()->paginate(10),
        ]);
    }

    public function create(): Renderable
    {
        $this->checkAuthorization(auth()->user(), ['user.create']);

        return view('backend.pages.users.create', [
            'roles' => Role::all(),
        ]);
    }

    public function store(UserRequest $request): RedirectResponse
    {
        $this->checkAuthorization(auth()->user(), ['user.create']);

        $user = new User();
        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        if ($request->roles) {
            $user->assignRole($request->roles);
        }

        session()->flash('success', __('User has been created.'));

        return redirect()->route('admin.users.index');
    }

    public function edit(int $id): Renderable
    {
        $this->checkAuthorization(auth()->user(), ['user.edit']);

        $user = User::findOrFail($id);

        return view('backend.pages.users.edit', [
            'user' => $user,
            'roles' => Role::all(),
        ]);
    }

    public function update(UserRequest $request, int $id): RedirectResponse
    {
        $this->checkAuthorization(auth()->user(), ['user.edit']);

        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->username = $request->username;
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }
        $user->save();
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }
        $user->save();

        $user->roles()->detach();
        if ($request->roles) {
            $user->assignRole($request->roles);
        }

        session()->flash('success', 'User has been updated.');

        return back();
    }

    public function destroy(int $id): RedirectResponse
    {
        $this->checkAuthorization(auth()->user(), ['user.delete']);

        $user = User::findOrFail($id);
        $user->delete();
        session()->flash('success', 'User has been deleted.');

        return back();
    }

    public function editProfile()
    {
        $user = Auth::user();
        return view('backend.pages.profile.edit', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|min:8|confirmed',
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password ? bcrypt($request->password) : $user->password,
        ]);

        session()->flash('success', 'Profile updated successfully.');

        return redirect()->route('profile.edit');
    }
}
