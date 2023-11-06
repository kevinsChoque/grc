<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function actionLogin()
    {
    	return view('login/login');
    }

}
