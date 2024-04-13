<?php

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

function sendResponse($is_api_request = true, $view = null, $data = null, $message = null, $http_status_code = 200)
{
    if($is_api_request == false && isset($view)){
        $data['data'] = $data ? $data : null;
        return view($view, $data);
    }else{
        $response = [
            'status'    => TRUE,
            'message'   => $message,
            'data'      => $data,
        ];
        return response()->json($response, $http_status_code);
    }
}
function sendError($is_api_request = true, $view = null, $error = null, $message = null, $http_status_code = 200)
{
    if($is_api_request == false && isset($error)){
        return redirect()->back()
                ->withErrors($error)
                ->withInput();
//        return view($view)->withErrors($error);
    }else{
        $response = [
            'status'    =>  FALSE,
            'message'   =>  $error,
            'error'     =>  isset($message) ? $message : 'An error occurred!',
        ];
        return response()->json($response, $http_status_code);
    }
}

/**
 * Generate Random String
 *
 * @param $length
 *
 * @return string
 */
// function STR_RANDOM($length)
// {
//     return Str::random($length);
// }

/**
 * Create New Directory
 *
 * @param string $name
 * @return bool
 */
// function MAKE_DIR(string $name): bool
// {
//     if (!Storage::disk('public')->exists($name)) {
//         Storage::disk('public')->makeDirectory($name);
//     }

//     return true;
// }

/**
 * Upload Given File
 * @param object $file
 * @param string $path
 * @param bool $rename
 * @param bool $unlink
 * @param string|null $oldPath
 *
 * @return bool|string

 *
 */
// function UPLOAD_FILE(object $file, string $path, $rename = true, bool $unlink = false, string $oldPath = null)
// {
//     $name = $rename ? STR_RANDOM(10) . '-' . time() . '.' . $file->getClientOriginalExtension() : $file->getClientOriginalName();
//     if (MAKE_DIR($path)) {

//         Storage::disk('public')->putFileAs($path, $file, $name);
//         $full_image_name = '/storage/' . $path . '/' . $name;
//         !$unlink ?: REMOVE_FILE($oldPath);
//         return $full_image_name;
//     }

//     return false;
// }

/**
 * Remove Existing File
 *
 * @param string $filepath
 * @return bool
 * @author Shaarif <m.shaarif@xintsolutions.com>
 */
// function REMOVE_FILE(string $filepath): bool
// {
//     return @unlink($filepath ?? '');
// }

// get all approved curators
function allCurators()
{
    $curators = User::where('is_approved', 1)->where('type','curator')->count();
    return $curators;
}


/**
 * @param $date
 * @return string
 * @author Farhan <farhanakram670@gmail.com>
 */
function getDateFormat($date,$days=""): string
{
    return Carbon::parse($date)->addDays($days)->format('d M Y');
}

/**
 * @param $date
 * @return string
 * @author Farhan <farhanakram670@gmail.com>
 */
function getDateNewFormat($date,$days=""): string
{
    return Carbon::parse($date)->addDays($days)->format('Y-m-d');
}

/**
 * @param $date
 * @return string
 */
function getExpiryDayCampaign($date): string
{
    $carbon =   Carbon::today();
    $carbon_target    = Carbon::parse($date)->addDays(45);

    if(Carbon::today() > $carbon_target)
        return 'false';
    else
        $diff_in_days = $carbon->diffInDays($carbon_target);
        return $diff_in_days.' Days Left';
}

/**
 * @param $name
 * @return string
 */
function UC_FIRST($name): string
{
    return Str::ucfirst($name);
}

function getProfileImage($user)
{
    $mystring = $user->profile;
    $findhttps   = 'https';
    $findhttp   = 'http';
    $poshttps = strpos($mystring, $findhttps);

    $poshttp = strpos($mystring, $findhttp);
    if($poshttps != false){
        $pos = $poshttps;
    }else{
        $pos = $poshttp;
    }

    if($pos === false)
    {
        $profile = url('uploads/profile').'/'.$mystring;
    }elseif($pos == 0){
        $profile = $mystring;
    }else{
        $profile = "//gravatar.com/avatar/00034587632094500000000000000000?d=retro";
    }
    return $profile;
}
function limitText($text, $limit) {
    if (strlen($text) > $limit) {
        $text = substr($text, 0, $limit);
        $text = substr($text, 0, strrpos($text, ' ')) . '...';
    }
    return $text;
}

/**
 * @param $text
 * @param $artist
 * @param $title
 * @param $releaseDate
 * @return array|string|string[]
 */
function replaceShortcodes($text, $artist, $title, $releaseDate)
{
    // Replace the shortcodes with the actual values
    $text = str_replace('{ARTIST}', $artist, $text);
    $text = str_replace('{TITLE}', $title, $text);
    $text = str_replace('{RELEASE_DATE}', getDateFormat($releaseDate), $text);

    return $text;
}
