<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function about_us()
    {
        return view('pages.landing.about_us');
    }

    public function contact()
    {
        return view('pages.landing.contact');
    }

    public function all_list()
    {
        return view('pages.landing.all_list');
    }

    public function admin_panel()
    {
        return view('admin.dashboard');
    }

    public function adminDashboard() {
        $result['page_title'] = 'Admin || Dashboard';
        return view('admin/dashboard',$result);
    }
}
