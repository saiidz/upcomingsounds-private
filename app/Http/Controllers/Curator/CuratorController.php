<?php
namespace App\Http\Controllers\Curator;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Country;
use App\Models\Language;
use Illuminate\Http\Request;

class CuratorController extends Controller {

    // Fixes the "Method index does not exist" error
    public function index() {
        return $this->dashboard();
    }

    // Fixes the "Method forCurators does not exist" error
    public function forCurators() {
        $countries = Country::all();
        $box = []; $flag = ""; $mystring = ""; $pos = 0;
        return view('pages.curators.for-curators', get_defined_vars());
    }

    public function dashboard() {
        $user = auth()->user();
        if (!$user) return redirect()->route('login');
        
        $notifications = $user->notifications()->latest()->get();
        $unReadNotifications = $user->unreadNotifications()->latest()->get();
        $countries = Country::all();
        
        // Safety variables for the 2024 design layout
        $box = []; $flag = ""; $mystring = ""; $pos = 0;
        $poshttp = ""; $poshttps = ""; $findhttp = ""; $findhttps = "";
        $selected_feature = ($user->userTags) ? $user->userTags->pluck("curator_feature_tag_id")->toArray() : [];

        return view('pages.curators.dashboard', get_defined_vars());
    }

    public function curatorProfile($user_id = null) {
        $user = ($user_id && is_numeric($user_id)) ? User::find($user_id) : auth()->user();
        if (!$user) return redirect()->route('login');

        $countries = Country::all();
        $languages = Language::all();
        $box = []; $flag = ""; $mystring = ""; $pos = 0;
        $selected_feature = ($user->userTags) ? $user->userTags->pluck("curator_feature_tag_id")->toArray() : [];

        return view('pages.curators.public-profile', get_defined_vars());
    }
}
