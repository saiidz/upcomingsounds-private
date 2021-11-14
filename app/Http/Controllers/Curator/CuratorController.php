<?php

namespace App\Http\Controllers\Curator;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CuratorController extends Controller
{

    /**
     * Curator Home
     */
    public function index()
    {
        return view('pages.curators.curator-home');
    }
}
