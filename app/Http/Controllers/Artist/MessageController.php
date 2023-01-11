<?php

namespace App\Http\Controllers\Artist;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function messages()
    {
        return view('pages.artists.artist-messages.message', get_defined_vars());
    }

    /**
     * @return Application|Factory|View
     */
    public function new()
    {
        return view('pages.artists.artist-messages.new', get_defined_vars());
    }

    /**
     * @return Application|Factory|View
     */
    public function viewed()
    {
        return view('pages.artists.artist-messages.viewed', get_defined_vars());
    }

    /**
     * @return Application|Factory|View
     */
    public function responses()
    {
        return view('pages.artists.artist-messages.responses', get_defined_vars());
    }
}
