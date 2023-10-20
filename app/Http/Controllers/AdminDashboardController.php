<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function home() {
        return view('admin-dashboard');
    }
    public function order() {
        return view('admin-order');
    }
}
