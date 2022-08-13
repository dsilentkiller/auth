<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
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
    ?>
