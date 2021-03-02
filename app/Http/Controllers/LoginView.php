<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginView extends Controller
{
    public function index( Request $request)
    {

        setcookie("idProyecto",'dato',time()+31556926 ,'/');


       if (empty(Auth::user()))
           {
               return view('auth.login');
           }

        Auth::logout();



        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
