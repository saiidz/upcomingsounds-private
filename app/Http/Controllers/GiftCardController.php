<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GiftCardController extends Controller
{
    public function index()
    {
        return view('gift-card.index');
    }
}
