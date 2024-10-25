<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Helpers\ApiHelper;
use App\Helpers\GlobalHelper;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class AdminExecuteController extends Controller
{
    public function login(Request $request) {
        try {
            $response = ApiHelper::execute($request, '/api/admin/login', 'POST');

            if ($response['status'] === 'error') {
                return back()->withErrors([
                    'message' => $response['info']['message']
                ])->onlyInput('email');
            }

            ApiHelper::custom_session(
                $request,
                'set',
                [
                    'sess_token_type' => $response['info']['token_type'],
                    'sess_token' => $response['info']['access_token']
                ],
            );

            return redirect('admin/dashboard');

        } catch (Exception $e) {
            Log::channel('info')->info($e->getMessage());

            return GlobalHelper::webErrorResponse('');
            // return back()->withErrors([
            //     'message' => 'Cannot Continue, please call system administrator'
            // ])->onlyInput('email');
        }
    }

    public function logout(Request $request) {
        $response = ApiHelper::execute($request, '/api/admin/logout', 'GET');

        if ($response['status'] === 'error') {
            return back()->withErrors([
                'message' => $response['info']['message']
            ])->onlyInput('email');
        }

        ApiHelper::custom_session($request, 'flush', '');
        $request->session()->invalidate();

        return redirect('/');
    }
}