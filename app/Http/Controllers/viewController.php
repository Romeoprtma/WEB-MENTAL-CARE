<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class viewController extends Controller
{
    public function viewHome(){
        $reviews = Review::with('user')->latest()->get();
        return view('components.user.home', compact('reviews'));
    }

    public function viewMeditasi(){
        return view('components.user.meditasi');
    }
    public function viewDashboardAdmin(){
        return view('components.admin.dashboardAdmin');
    }
    public function viewListPsikolog(){
        return view('components.user.listPsikolog');
    }
}
