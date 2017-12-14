<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class UsersController extends Controller
{
    function Login(Request $request){
        if ($request->has('login') && $request->has('password') ) {

            $login = $request->input('login');
            $password = $request->input('password');
            $User = User::where([
                            ['login', '=', $login],
                            ['password', '=', md5($password)]
                            ])->get();
            if ($User->isEmpty()){
                return view('error')->withError('Wrong Password or Login');
            }
            else {
               session(['id' => $User[0]->id]);
               return redirect('/');
            }
        }
        else {
            return view('error')->withError('Missed Data (Password or Login)');
        }
    }
}
