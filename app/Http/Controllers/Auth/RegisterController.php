<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\VerifyUser;
use App\Mail\VerifyMail;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/register-waiting';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first-name'    => 'required|string|max:255',
            'last-name'     => 'required|string|max:255',
            'email'         => 'required|string|email|max:255|unique:users',
            'password'      => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $user = new User;

        $user->first_name   = $data['first-name'];
        $user->last_name    = $data['last-name'];
        $user->mobile       = $data['mobile'];
        $user->email        = $data['email'];
        $user->password     = Hash::make($data['password']);

        $user->save();

        $verifyUser = new VerifyUser;

        $verifyUser->user_id = $user->user_id;
        $verifyUser->token = str_random(40);

        $verifyUser->save();

        Mail::to($user->email)->send(new VerifyMail($user));

        return $user;
    }

    public function verifyUser($token)
    {
        $verifyUser = VerifyUser::where('token', $token)->first();
        if(isset($verifyUser)){
            $user = $verifyUser->user;
            if(!$user->is_confirmed) {
                $verifyUser->user->is_confirmed = 1;
                $verifyUser->user->save();
                $success = "Your e-mail is verified. You can now login.";
            }else{
                $success = "Your e-mail is already verified. You can now login.";
            }
        }else{
            return redirect('/login')->with('error', "Sorry your email cannot be identified.");
        }

        return redirect('/login')->with('success', $success);
    }

    protected function registered(Request $request, $user)
    {
        $this->guard()->logout();
    }
}
