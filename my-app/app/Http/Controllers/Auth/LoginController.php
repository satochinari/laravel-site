<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\DB;

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
        return 'name';
    }

    /*$first = User::where('name', $name)
            ->where('password', $password)
            ->first();*/

    public function authenticate(Request $request)
    {
        $name = $request->input('name');
        $password = $request->input('password');

        $first = DB::table('users')
            ->whereRaw('name = \'' . $name . '\'')
            ->whereRaw('password = \'' . $password . '\'')
            ->first();

        if ($first) {
            $user = User::where('name', $name)->first();
            Auth::loginUsingId($user->id);
            return redirect('/home');
        } else {
            return redirect()->back();
        }
    }

    /*if ($first) {
        Auth::loginUsingId($first->id);
        return redirect('/');
    } else {
        return redirect()->back();
    }*/

    /*public function authenticate(Request $request)
    {
        $name = $request->name;
        $password = $request->password;
        if (Auth::validate(['name' => $name, 'password' => $password]))
        {
            $user = User::where('name', $name)->first();
            Auth::loginUsingId($user->id);
            return redirect('/');
        }
        return redirect()->back();
    }*/
}