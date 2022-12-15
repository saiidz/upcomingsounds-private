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
