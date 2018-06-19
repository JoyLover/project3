<?php

namespace App\Http\Controllers\Auth;

use App\Visit;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
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

    public function authenticated(Request $request, $user)
    {
        if (!$user->is_confirmed) {
            auth()->logout();
            return back()->with('error', 'You need to confirm your account. 
                                We have sent you an verification link, please check your email.');
        } else {
            $user->frequency++;
            $user->save();

            $visitor = Visit::where('user_id', $user->user_id)->first();

            if ($visitor === null) {
                $visitor = new Visit;

                $visitor->user_id = $user->user_id;
                $visitor->current_ip = request()->ip();
                $visitor->last_ip = request()->ip();

                $visitor->save();
            } else {
                $visitor->last_ip = $visitor->current_ip;
                $visitor->current_ip = request()->ip();
                $visitor->created_at = $visitor->updated_at;
                $visitor->updated_at = Carbon::now()->toDateTimeString();

                $visitor->save();
            }
        }

        $data = [
            'user'      =>  $user,
            'visitor'   =>  $visitor
        ];

        return redirect()->intended($this->redirectPath())->with('user', $user)->with('visitor', $visitor);
    }

    public function logout(Request $request)
    {
        auth()->logout();
        return redirect('/logout-waiting')->with('success', 'You successfully logout');
    }
}
