<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    // public function create_register(){
    //     return view('auth.register');
    // }

    public function register(Request $request){

            $request->validate([
                'username' =>'required|string|max:255',
                'name' => 'required|string|max:255',
                'email'=>'required|string|email|max:255|unique:users',
                'phone_no'=>'required|min:11|numeric',
                'age'=>'required|numeric',
                'gender'=> 'required|in:male,female',
                'password'=> 'required|string|min:8|confirmed',
                'confirm_password'=> 'required|string|min:8|confirmed|matches',

                'profile_image'=>'image|mimes:jpeg,png,pdf,jpg,gif,svg|max:2048',

            ]);
            $data  = $request->all();
            $check = $this->create($data);
            return redirect('dashboard')->withSuccess('your Registration sucessfully completed!');

    }

    public function create_register(array $data){
        $path = $request->file('profile_image') ?? null;
        if ($request->hasFile('profile_image'))
        {
            $file = $request->file('profile_image');
            $name = time();
            $extension = $file->getClientOriginalExtension();
            $fileName = $name . '.' . $extension;
            $path = $file->storeAs('images/users', $fileName, 'public');
        }
        $user =User::create([

            'username'=> $data['username'],
            'name' => $data['name'],
            'email'=>$data['email'],
            'phone_no'=>$data['phone_no'],
            'age' =>$data['age'],
            'gender'=>$data['gender'],
            'password' => Hash::make($data['password']),
            'profile_image' =>$path,
        ]);
    }

            public function login(Request $request){
                $request->validate([
                    'email'=>'required',
                    'password'=>'required',
                ]);
                $credintials= $request->only('email', 'password');
                if(Auth::attempt($credintials)){
                    return redirect()->intended('dashboard')->withSuccess('Signed in');
                }
            return redirect('login')->withSuccess('Login details are not Valid');
             }

             public function index(){
                return view('auth.login');
             }

             public function dashboard(){
                return view('dashboard');
             }


}
