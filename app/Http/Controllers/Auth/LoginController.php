<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Socialite;
use App\User;

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

    /**
     * Obtain the user information from GitHub.
     *
     * @return Response
     */
    public function handleProviderCallback($provider)
    {

        try
        {
            $user = Socialite::driver($provider)->user();
        }
        catch(\Exception $e)
        {
            session()->flash('message', 'Cuenta no existe');
            return redirect('login');
        }

         $socialuser = User::where('email',$user->getEmail())->first();

         if($socialuser == NULL){
           session()->flash('message', 'Cuenta no existe');
           return redirect('login');
         }else{
           User::where('email',$user->getEmail())
                     ->update([
                       'social_name' => $user->getName(),
                       'email' => $user->getEmail(),
                       'social_id' => $user->getId(),
                       'avatar' => $user->getAvatar(),
                     ]);

           auth()->login($socialuser);
           return redirect()->To('home');

         }

    }
}
