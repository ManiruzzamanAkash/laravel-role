<?php

namespace App\Http\Controllers\Backend\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::ADMIN_DASHBOARD;

    /**
     * show login form for admin guard
     */
    public function showLoginForm(): Renderable
    {
        $email = app()->environment('local') ? 'superadmin@example.com' : '';
        $password = app()->environment('local') ? '12345678' : '';

        return view('backend.auth.login')->with(compact('email', 'password'));
    }

    /**
     * Login admin.
     *
     * @return void
     */
    public function login(Request $request)
    {
        // Validate Login Data
        $request->validate([
            'email' => 'required|max:50|email',
            'password' => 'required',
        ]);

        // Attempt to login
        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            // Redirect to dashboard
            session()->flash('success', 'Successfully Logged in!');

            return redirect()->route('admin.dashboard');
        } else {
            // Search using username
            if (Auth::guard('admin')->attempt(['username' => $request->email, 'password' => $request->password], $request->remember)) {
                session()->flash('success', 'Successfully Logged in!');

                return redirect()->route('admin.dashboard');
            }
            // error
            session()->flash('error', 'Invalid email or password');

            return back();
        }
    }

    /**
     * logout admin guard
     *
     * @return void
     */
    public function logout()
    {
        Auth::guard('admin')->logout();

        return redirect()->route('admin.login');
    }
}
