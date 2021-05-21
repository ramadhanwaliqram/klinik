<?php

namespace App\Http\Controllers\Auth;

use Auth;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
    // protected $redirectTo = RouteServiceProvider::HOME;
    public function redirectTo() {
        if (auth()->user()->role == 'admin') {
            $this->redirectTo = route('admin.admin');
            return $this->redirectTo;
        } else if (auth()->user()->role == 'dokter') {
            $this->redirectTo = route('dokter.dokter');
            return $this->redirectTo;
        }else if(auth()->user()->role == 'pasien'){
            $this->redirectTo = route('depan');
            return $this->redirectTo;
        } else {
            $this->redirectTo = route('home');
            return $this->redirectTo;
        }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function username()
    {
        return 'username';
    }
}
