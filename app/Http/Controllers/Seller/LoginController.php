<?php

namespace App\Http\Controllers\Seller;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
     public function __construct()
    {
        $this->middleware('guest:seller', ['except' => 'logout']);
    }

    protected function credentials(Request $request)
    {
      $credentials = $request->only($this->username(), 'password');
      return array_add($credentials, 'acStatus', 0);
    }

    protected function sendLoginResponse(Request $request)
    {


        $request->session()->regenerate();

        $this->clearLoginAttempts($request);

        foreach ($this->guard()->user()->role as $role) {

            if ($role->name == 'seller') {
                return redirect('seller/home');
            }elseif ($role->name == 'editor') {
                return redirect('seller/editor');
            }
          }


    }


    /**
     * Show the application's login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm()
    {
        return view('seller.Auth.login');
    }
    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('seller');
    }
}
