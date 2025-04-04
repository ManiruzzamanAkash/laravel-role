<?php

declare(strict_types=1);

namespace App\Http\Controllers\Backend;

use App\Enums\ActionType;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

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

        ld_do_action('user_create_page_before');

        return view('backend.pages.users.create', [
            'roles' => Role::all(),
        ]);
    }

    public function store(UserRequest $request): RedirectResponse
    {
        $this->checkAuthorization(auth()->user(), ['user.create']);

        $user = new User;
        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        $user = ld_apply_filters('user_store_before_save', $user, $request);
        $user->save();
        $user = ld_apply_filters('user_store_after_save', $user, $request);

        if ($request->roles) {
            $user->assignRole($request->roles);
        }

        $this->storeActionLog(
            ActionType::CREATED,
            null,
            ['user' => $user]
        );

        session()->flash('success', __('User has been created.'));

        ld_do_action('user_store_after', $user);

        return redirect()->route('admin.users.index');
    }

    public function edit(int $id): Renderable
    {
        $this->checkAuthorization(auth()->user(), ['user.edit']);

        ld_do_action('user_edit_page_before');

        $user = User::findOrFail($id);

        $user = ld_apply_filters('user_edit_page_before_with_user', $user);

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
        $user = ld_apply_filters('user_update_before_save', $user, $request);
        $user->save();
        $user = ld_apply_filters('user_update_after_save', $user, $request);
        ld_do_action('user_update_after', $user);

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
        $user = ld_apply_filters('user_delete_before', $user);
        $user->delete();
        $user = ld_apply_filters('user_delete_after', $user);
        session()->flash('success', 'User has been deleted.');

        ld_do_action('user_delete_after', $user);

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
            'email' => 'required|email|unique:users,email,'.$user->id,
            'password' => 'nullable|min:8|confirmed',
        ]);

        $requestInputs = ld_apply_filters('user_profile_update_data_before', [
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password ? bcrypt($request->password) : $user->password,
        ], $user);

        $user->update($requestInputs);

        ld_do_action('user_profile_update_after', $user);

        session()->flash('success', 'Profile updated successfully.');

        return redirect()->route('profile.edit');
    }
}
