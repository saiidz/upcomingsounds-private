<?php

namespace App\Helpers;
use Illuminate\Http\Request;
use Config;
use Illuminate\Support\Str;

class Helper
{
    public static function fallback (Request $request){
        if($request->expectsJson()){
            return sendError($request->wantsJson(),null,'Invalid URL or METHOD!', null, 404);
        }else{
            return response()->view('errors.404');
        }
    }
}
