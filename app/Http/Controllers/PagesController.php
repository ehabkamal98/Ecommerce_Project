<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function show_login(){
        return view('login');
    }
    public function show_reg(){
        return view('register');
    }
    public function show_admin(){
        return view('dashboard');
    }
}
