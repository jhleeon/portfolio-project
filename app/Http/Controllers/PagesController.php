<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Main;
use App\Models\Portfolio;
use App\Models\Service;
use Illuminate\Http\Request;

class PagesController extends Controller
{

    // Fornt-end main page
    public function index()
    {

        $main = Main::first();
        $services = Service::all();
        $portfolios = Portfolio::all();
        $abouts = About::all();
        return view('pages.index',compact('main','services', 'portfolios', 'abouts'));
    }

    // Admin Dashboard
    public function dashboard()
    {
        return view('pages.dashboard');
    }
}
