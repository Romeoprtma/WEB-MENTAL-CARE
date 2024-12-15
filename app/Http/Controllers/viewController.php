<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class viewController extends Controller
{
    public function viewHome(){
        return view('components.user.home');
    }

    public function viewMeditasi(){
        return view('components.user.meditasi');
    }

    public function viewDashboardAdmin(){
        return view('components.admin.dashboardAdmin');
    }
}
