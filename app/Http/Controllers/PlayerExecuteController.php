<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PlayerExecuteController extends Controller
{
    public function list(Request $request) {
        try {
            $response = apiHelper()->execute($request, '/api/players/list', 'POST');
            if ($response['status'] == "error") {
                return globalHelper()->ajaxErrorResponse($response['message']);
            } else {
                
                $html_view = viewHelper()->createPlayersTable($response);
                return globalHelper()->ajaxSuccessResponse($html_view);
            }
        } catch (Exception $e) {
            Log::channel('info')->info(json_encode($e->getTrace()));
            return globalHelper()->ajaxErrorResponse('');
        }
    }

    public function save(Request $request) {
        try {
            $response = apiHelper()->execute($request, '/api/players/save', 'POST');
            
            if ($response['status'] == "error") {
                return globalHelper()->ajaxErrorResponse($response['message']);
            } else {
                // return globalHelper()->ajaxErrorResponse('User succesfully saved!<br />Please check the list to check the username and password.', '/admin/accounts');
                
                return globalHelper()->ajaxSuccessResponse(
                    "_confirmAdd('Player succesfully enrolled!', '/cashier/enrollments');"
                );
            }
        } catch (Exception $e) {
            Log::channel('info')->info($e->getMessage());
            return globalHelper()->ajaxErrorResponse('');
        } 
    }
}