<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Storage;

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
    protected $redirectTo = '/home';

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
            'rollno'=>['required','nullable','string'],
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'role' => ['required', 'string', 'max:255'],
            'yearofgrad'=>['required','nullable','string'],
            'dept' => ['required', 'string', 'max:255'],
            'currloc' => ['required', 'string', 'max:255'],
            'hometown' => ['required', 'string', 'max:255'],
            'company' => ['required', 'string', 'max:255'],
            'designation' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
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
        return User::create([
            'rollno'=>$data['rollno'],
            'firstname'=>$data['firstname'],
            'lastname'=>$data['lastname'],
            'role'=>$data['role'],
            'yearofgrad'=>$data['yearofgrad'],
            'dept'=>$data['dept'],
            'currloc'=>$data['currloc'],
            'hometown'=>$data['hometown'],
            'company'=>$data['company'],
            'designation'=>$data['designation'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
