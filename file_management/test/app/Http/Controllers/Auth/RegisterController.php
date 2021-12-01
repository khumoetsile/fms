<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use App\Account;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;

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
    //protected $redirectTo = RouteServiceProvider::HOME;
    protected $redirectTo = '/';

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
            'accounts_fname'    => ['required', 'string', 'max:255'],
            'accounts_lname'    => ['required', 'string', 'max:255'],
            'accounts_cnic'     => ['required', 'string', 'max:255', 'unique:accounts'],
            'accounts_username' => ['required', 'string', 'max:255', 'unique:accounts'],
            'accounts_phone'    => ['required', 'string', 'max:255', 'unique:accounts'],
            'accounts_mobile'   => ['required', 'string', 'max:255', 'unique:accounts'],
            'accounts_email'    => ['required', 'string', 'email',  'max:255', 'unique:accounts'],
            'password'          => ['required', 'string', 'min:8', 'confirmed'],
            'accounts_agreement'=> ['required', 'string', 'max:1'],
            'accounts_status'   => ['required', 'string', 'max:1'],
            'created_by'        => ['required', 'string', 'max:255'],
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
        
        $account = Account::create([
            'accounts_fname'    => $data['accounts_fname'],
            'accounts_lname'    => $data['accounts_lname'],
            'accounts_cnic'     => $data['accounts_cnic'],
            'accounts_username' => $data['accounts_username'],
            'accounts_phone'    => $data['accounts_phone'],
            'accounts_mobile'   => $data['accounts_mobile'],
            'accounts_email'    => $data['accounts_email'],
            'accounts_agreement'=> $data['accounts_agreement'],
            'accounts_status'   => $data['accounts_status'],
            'created_by'        => $data['created_by'],
        ]);

        $last_inserted_id = $account['id'];
        $user = User::create([
            'email'             => $data['accounts_email'],
            'username'          => $data['accounts_username'],
            'fname'             => $data['accounts_fname'],
            'lname'             => $data['accounts_lname'],
            'usercompany'       => 'VUP',
            'password'          => Hash::make($data['password']),
            'user_status'       => $data['accounts_status'],
            'accounts_id'       => $last_inserted_id,
            'created_by'        => $data['created_by'],
        ]);

        $role = 'Customer';
        $user->assignRole($role);
        return $user; 
    }
}
