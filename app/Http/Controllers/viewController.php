<?php

namespace App\Http\Controllers;

use App\Models\Meditasi;
use App\Models\Psikolog;
use App\Models\Review;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class viewController extends Controller
{
    public function approveTes(){
        return view('components.admin.approveTesKepribadian');
    }

    public function viewRiwayatChat(){
        $user = User::whereIn('role', ['user'])->get();
        return view('components.psikolog.chat.riwayatChat', compact('user'));
    }
    public function viewPsikolog(){
        return view('components.psikolog.profile.dashboardPsikolog');
    }

    public function viewHome(){
        $psikolog = User::whereIn('role', ['psikolog'])->get();
        $reviews = Review::with('user')->latest()->get();
        return view('components.user.home', compact('reviews', 'psikolog'));
    }

    public function viewMeditasi(){
        $songs = Meditasi::all();
        return view('components.user.meditasi', compact('songs'));
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
        if (Auth::user()->role === 'psikolog'){
            return view('components.psikolog.chat.chatPsikolog',compact('user'));
        }
        return view('components.user.chat',compact('user'));
    }
    public function viewTesKepribadian(){
        return view('components.psikolog.kelolaTesKepribadian');
    }
}


