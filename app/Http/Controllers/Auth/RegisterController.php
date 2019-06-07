<?php

namespace App\Http\Controllers\Auth;

use App\Role;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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
    protected $redirectTo = '/home';

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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role' => ['required']
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
//    protected function create(array $data)
//    {
//
////        dd($data);
////        $user = User::create([
////            'name' => $data['name'],
////            'email' => $data['email'],
////            'password' => Hash::make($data['password']),
////            'bio' => $data['bio'],
////            'phone_number' => $data['phone_number']
////
////        ]);
//        $user = new User();
//        $user->name = $data['name'];
//        $user->email = $data['email'];
//        $user->password =Hash::make($data['name']);
//        $user->bio = $data['bio'];
//        $user->phone_number = $data['phone_number'];
//
//        $user->attachRole(Role::findOrFail($data['role']));
////        dd($user);
//
//        return $user;
//    }

    public function register ( Request $request )
    {

        $user = new User();
        $user->name =$request->name;
        $user->email =$request->email;
        $user->password =Hash::make($request->password);
        $user->bio =$request->bio;
        $user->phone_number =$request->phone_number;
        $user->status = "accepted";
        $user->save();

        $user->attachRole(Role::findOrFail($request->role));

        return redirect(route('login'))->with('message' , 'you have successfully created an account. you can sign in now.');
    }


    public function showRegistrationForm ()
    {
        $roles = Role::all();
        return view('auth.register', compact('roles'));
    }
}
