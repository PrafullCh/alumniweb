<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use Storage;
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
    protected $redirectTo = '/admin';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $ip_file = Storage::disk('local')->get('ip_registry.json');
        $ip = json_decode($ip_file);
        if(in_array($_SERVER['REMOTE_ADDR'],$ip->ip)!=1)
        {
            array_push($ip['ip'],$_SERVER['REMOTE_ADDR']);
        }
        Storage::put('ip_registry.json',json_encode($ip));
        $this->middleware('guest',['except'=>['logout','userLogout']]);
        
    }
    public function userLogout(Request $request)
    {
        Auth::guard('web')->logout();

        //$request->session()->invalidate();

        return /*$this->loggedOut($request) ?:*/ redirect('/');
    }
}
