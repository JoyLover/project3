<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index () {
        return view('auth/register');
    }

    public function registerWaiting () {
        return view('pages/registerWaiting');
    }

    public function logoutWaiting () {
        return view('pages/logoutWaiting');
    }
}
