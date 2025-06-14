<?php

namespace App\Http\Controllers;

use App\Models\Psikolog;
use App\Models\Review;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class viewController extends Controller
{
    public function viewHome(){
        $psikolog = User::whereIn('role', ['psikolog'])->get();
        $reviews = Review::with('user')->latest()->get();
        return view('components.user.home', compact('reviews', 'psikolog'));
    }

    public function viewMeditasi(){
        return view('components.user.meditasi');
    }
    public function viewDashboardAdmin(){
        return view('components.admin.dashboardAdmin');
    }
    public function viewListPsikolog(){
        $psikolog = User::whereIn('role', ['psikolog'])->get();
        return view('components.user.listPsikolog', compact('psikolog'));
    }
    public function viewChat($userId){
        $user = User::findOrFail($userId);
        return view('components.user.chat',compact('user'));
    }
}
