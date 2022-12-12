<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
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
    
    
   protected $redirectTo = '/';
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)

    {   
        $input = $request->all();   
        $this->validate($request, [

            'email' => 'required|email',
            'password' => 'required',

        ]);

   

        if(auth()->attempt(array('email' => $input['email'], 'password' => $input['password'])))

        {

            if (auth()->user()->type == "Admin") {

                $this->redirectTo='admin';

            }else{

                // return view('user.dashboard');
                $this->redirectTo='user';
            }  
            return redirect()->intended($this->redirectPath());     


        }else{

            return redirect()->back()

                ->with('error','Email-Address And Password Are Wrong.');
        }          

    }
}
