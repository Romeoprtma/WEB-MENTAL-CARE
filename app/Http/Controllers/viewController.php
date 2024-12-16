<?php

namespace App\Http\Controllers;

use App\Models\Psikolog;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class viewController extends Controller
{
    public function viewHome(){
        $psikologs = Psikolog::all();
        $reviews = Review::with('user')->latest()->get();
        return view('components.user.home', compact('reviews', 'psikologs'));
    }

    public function viewMeditasi(){
        return view('components.user.meditasi');
    }
    public function viewDashboardAdmin(){
        return view('components.admin.dashboardAdmin');
    }
    public function viewListPsikolog(){
        $psikologs = Psikolog::all();
        return view('components.user.listPsikolog', compact('psikologs'));
    }
    public function viewChat(){
        $psikologs = Psikolog::all();
        return view('components.user.chat',compact('psikologs'));
    }
}
