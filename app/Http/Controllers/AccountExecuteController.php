<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AccountExecuteController extends Controller
{
    public function list(Request $request) {
        try {
            $response = apiHelper()->execute($request, '/api/accounts/list', 'POST');
            if ($response['status'] == "error") {
                return globalHelper()->ajaxErrorResponse($response['message']);
            } else {
                
                $html_view = viewHelper()->createAccountsTable($response);
                return globalHelper()->ajaxSuccessResponse($html_view);
            }
        } catch (Exception $e) {
            Log::channel('info')->info(json_encode($e->getTrace()));
            return globalHelper()->ajaxErrorResponse('');
        }
    }
    
    public function save(Request $request) {
        try {
            $response = apiHelper()->execute($request, '/api/accounts/save', 'POST');

            if ($response['status'] == "error") {
                return globalHelper()->ajaxErrorResponse($response['message']);
            } else {
                // return globalHelper()->ajaxErrorResponse('User succesfully saved!<br />Please check the list to check the username and password.', '/admin/accounts');
                
                return globalHelper()->ajaxSuccessResponse(
                    "_confirmAdd('info', 'User succesfully saved!<br />Please check the list to check the username and password!');"
                );
            }
        } catch (Exception $e) {
            Log::channel('info')->info($e->getMessage());
            return globalHelper()->ajaxErrorResponse('');
        } 
    }

    public function update(Request $request) {
        try {
            $response = apiHelper()->execute($request, "/api/accounts/update/{$request->Id}", 'POST');
            
            if ($response['status'] == "error") {
                return globalHelper()->ajaxErrorResponse($response['message']);
            } else {
                
                return globalHelper()->ajaxSuccessResponse(
                    "_confirmUpdate('User successfully updated!', '/admin/accounts');"
                );
            }
        } catch (Exception $e) {
            Log::channel('info')->info($e->getMessage());
            return globalHelper()->ajaxErrorResponse('');
        }   
    }

    public function reset(Request $request) {
        try {
            $response = apiHelper()->execute($request, "/api/accounts/reset-password/{$request->Id}", 'POST');
            
            if ($response['status'] == "error") {
                return globalHelper()->ajaxErrorResponse($response['message']);
            } else {
                
                return globalHelper()->ajaxSuccessResponse(
                    "_systemAlert('info', 'Password reset, please check new password below.<br /><br /> <h3 class=\'text-strong\'>{$response['info']}</h3>');"
                );
            }
        } catch (Exception $e) {
            Log::channel('info')->info($e->getMessage());
            return globalHelper()->ajaxErrorResponse('');
        }   
    }

    public function deactivate(Request $request) {
        try {
            $response = apiHelper()->execute($request, "/api/accounts/deactivate/{$request->Id}", 'POST');
            
            if ($response['status'] == "error") {
                return globalHelper()->ajaxErrorResponse($response['message']);
            } else {
                
                return globalHelper()->ajaxSuccessResponse(
                    "_confirmUpdate('User successfully updated!', '/admin/accounts');"
                );
            }
        } catch (Exception $e) {
            Log::channel('info')->info($e->getMessage());
            return globalHelper()->ajaxErrorResponse('');
        }   
    }
}