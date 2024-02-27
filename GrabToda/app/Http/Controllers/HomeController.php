<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Http\Request;
use Illuminate\View\View;


class HomeController extends Controller
{
    public function index(){
        return view('home.index');
    }
    public function bookToLogin(){
        return view('auth.login');
    }

}
