<?php

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
