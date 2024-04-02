<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use GeneaLabs\LaravelSocialiter\Facades\Socialiter;
use Socialite;
use App\Services\SocialRevoke;
use Session;
use Illuminate\Http\Request;
use CoreComponentRepository;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use GuzzleHttp\Client;
use Auth;
use App\Providers\RouteServiceProvider;


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
    /*protected $redirectTo = '/';*/


    /**
     * Redirect the user to the Google authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    

   
    

    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except(['logout', 'account_deletion']);
    }

    public function login(Request $request)
    {
        // Login validation logic (replace with your validation rules)
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        // Attempt login using Laravel Auth
        if (Auth::attempt($credentials, $request->has('remember'))) {
            if (Auth::user()) {
                $code = Auth::user()->code;
                if($code != '0' && !empty($code)) {
                    // User is logged in, redirect to intended or custom location
    
                    return redirect(RouteServiceProvider::HOME);
                } else {
                    return redirect(RouteServiceProvider::DASHBOARD);
                }
            }
            // Login successful, redirect with intended URL (handled by middleware)
            return redirect()->intended(route('home'));
        }

        return back()->withErrors(['email' => 'Invalid login credentials']);
    }
}
