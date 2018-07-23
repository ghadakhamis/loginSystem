<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;

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
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request){
        
        // request validation 
        $this->validate($request, [
            'emailORmobile'    => 'required',
            'password' => 'required',
        ]);

        // defined field which user logged in
        $field = filter_var($request->emailORmobile, FILTER_VALIDATE_EMAIL) ? 'email' : 'mobile_number';
        
        // change parameter in the request to field type which user logged in
        $request->merge([$field => $request->emailORmobile]);

        if (Auth::attempt($request->only($field, 'password'))) {
            return redirect()->intended($this->redirectTo);
        } 
        return redirect()->back()->withInput()->withErrors([ 'emailORmobile' => "These credentials do not match our records." ]);
    }
}
