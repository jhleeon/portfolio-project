<?php

namespace App\Http\Controllers;

use App\Models\Main;
use Illuminate\Http\Request;

class PagesController extends Controller
{

    // Fornt-end main page
    public function index()
    {
        $main = Main::first();
        return view('pages.index',compact('main'));
    }

    // Admin Dashboard
    public function dashboard()
    {
        return view('pages.dashboard');
    }
}
