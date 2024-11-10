<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AgentExecuteController extends Controller
{
    public function list(Request $request) {
        try {
            $response = apiHelper()->execute($request, '/api/agents/list', 'POST');
            if ($response['status'] == "error") {
                return globalHelper()->ajaxErrorResponse($response['message']);
            } else {
                
                $html_view = viewHelper()->createAgentsTable($response);
                return globalHelper()->ajaxSuccessResponse($html_view);
            }
        } catch (Exception $e) {
            Log::channel('info')->info(json_encode($e->getTrace()));
            return globalHelper()->ajaxErrorResponse('');
        }
    }

    public function save(Request $request) {
        try {
            $response = apiHelper()->execute($request, '/api/agents/save', 'POST');
            
            if ($response['status'] == "error") {
                return globalHelper()->ajaxErrorResponse($response['message']);
            } else {                
                return globalHelper()->ajaxSuccessResponse(
                    "_confirmAdd('Agent succesfully saved!', '/cashier/agents');"
                );
            }
        } catch (Exception $e) {
            Log::channel('info')->info($e->getMessage());
            return globalHelper()->ajaxErrorResponse('');
        } 
    }

}