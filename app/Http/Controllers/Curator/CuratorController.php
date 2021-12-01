<?php

namespace App\Http\Controllers\Curator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CuratorController extends Controller
{

    /**
     * Curator Home
     */
    public function index()
    {
        return view('pages.curators.curator-home');
    }

    // curatorProfile
    public function curatorProfile(){
        $user_curator = Auth::user();
        return view('pages.curators.curator-profile',compact('user_curator'));
    }
}
