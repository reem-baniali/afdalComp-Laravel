<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Owner;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
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
    protected $redirectTo = RouteServiceProvider::HOME;
    // protected $redirectTo = '/index';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        Session::put('url.intended',URL::previous());
        return view('auth.login');        
    }
    
    protected function authenticated(Request $request, $user)
    {
        if (auth()->attempt(array(
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ))) {
            if (Auth::user()->name == 'Admin') {
                return redirect()->to('home');
            } else {
                return Redirect::to(Session::get('url.intended'));
            }
        }
    }
}
