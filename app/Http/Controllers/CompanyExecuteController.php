<?php

namespace App\Http\Controllers;

use App\Helpers\GlobalHelper;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CompanyExecuteController extends Controller
{
    public function list(Request $request) {
        try {
            $response = apiHelper()->execute($request, '/api/company/list', 'POST');
            
            if ($response['status'] == "error") {
                return globalHelper()->ajaxErrorResponse($response['message']);
            } else {
                $html_view = viewHelper()->createCompanyTable($response);
                // return $html_view;
                return globalHelper()->ajaxSuccessRespone($html_view);
            }
        } catch (Exception $e) {
            Log::channel('info')->info($e->getMessage());
            return globalHelper()->ajaxErrorResponse('');
        }
    }
    
    public function save(Request $request) {
        try {
            $response = apiHelper()->execute($request, '/api/company/save', 'POST');
            
            if ($response['status'] == "error") {
                return globalHelper()->ajaxErrorResponse($response['message']);
            } else {
                return globalHelper()->ajaxErrorResponse('Company succesfully saved!', '/admin/companies');
            }
        } catch (Exception $e) {
            Log::channel('info')->info($e->getMessage());
            return globalHelper()->ajaxErrorResponse('');
        }   
    }
}