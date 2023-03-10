<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Backend\AppUser;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    const API_ACCESS_KEY = "AAAAY7XSMrU:APA91bE27CbAN8aWlhiqpWZvY-CLvAR5tE8OUVdjQj0tCg6es7TWQegG_Tfg27-wD45ZaTN0N-tZtWjedwtFoLo16UC5Nny_N-QLuEMtDhxefTANH3bmolMLBO-dBRbVSAm-lNdY1Nv3";
    
    public function sendResponse($result, $success = NULL, $message = NULL, $error_code = 0)
    {
        $response = [
            'success' => $success,
            'data' => $result,
            'message' => $message,
            'error_code' => $error_code,

        ];

        return response()->json($response, 200);
    }

    public function getToken(){

        $headers = getallheaders();
        return (isset($headers['token'])) ? $headers['token'] : 'no_token';
    }
    
    public function user(){
        return AppUser::where('token', $this->getToken())->first();
    }
}
