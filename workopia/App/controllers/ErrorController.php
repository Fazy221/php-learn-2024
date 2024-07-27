<?php

namespace App\Controllers;

class ErrorController
{
    public function notFound($message='Resource not found!')
    {
        http_response_code(404);
        loadView('error', [
            'status' => '404',
            'message' => $message
        ]);
    }
    public function notAuthorized($message = 'You\'re not authorized' )
    {
        http_response_code(403);
        loadView('error', [
            'status'=>'403',
            'message'=>$message
        ]);
    }
}
