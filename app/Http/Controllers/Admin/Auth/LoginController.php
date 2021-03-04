<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
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
    protected $redirectTo = 'admin/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    protected function guard()
    {
        return Auth::guard('admin');
    }
    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }
    public function showLoginForm()
    {
        return view('admin.auth.login');
    }

    // public function login(Request $request)
    // {
    //     $validate = $request->validate([
    //         'email' => 'required|email',
    //         'password' => 'required|min:6',
    //     ]);

    //     if ($this->guard()->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {

    //         return redirect()->intended($this->redirectTo);
    //     }

    // }

    public function logout(Request $request)
    {
        $this->guard()->logout();
        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return \redirect()->route('admin.login');
    }
}