<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TransactionExecuteController extends Controller
{
    public function list($player_id, Request $request) {
        try {
            $response = apiHelper()->execute($request, '/api/transactions/list/'.$player_id, 'POST');
            
            if ($response['status'] == "error") {
                return globalHelper()->ajaxErrorResponse($response['message']);
            } else {
                
                $html_view = viewHelper()->createTransactionsTable($response);
                return globalHelper()->ajaxSuccessResponse($html_view);
            }
        } catch (Exception $e) {
            Log::channel('info')->info(json_encode($e->getTrace()));
            return globalHelper()->ajaxErrorResponse('');
        }
    }

    public function save($player_id, Request $request) {
        try {
            $response = apiHelper()->execute($request, '/api/transactions/save/'.$player_id, 'POST');
            
            if ($response['status'] == "error") {
                return globalHelper()->ajaxErrorResponse($response['message']);
            } else {                
                return globalHelper()->ajaxSuccessResponse(
                    "_confirmAdd('Transaction succesfully saved!', '/cashier/players');"
                );
            }
        } catch (Exception $e) {
            Log::channel('info')->info($e->getMessage());
            return globalHelper()->ajaxErrorResponse('');
        } 
    }
}