<?php

namespace App\Http\Controllers;

use App\Helpers\ApiHelper;
use App\Models\UserSettings;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class UserSettingsController extends Controller
{
 
    public function update(Request $request, UserSettings $userSettings) {

        try {
            $response = ApiHelper::execute($request, '/api/settings/update-mode', 'POST');
            Log::channel('info')->info(json_encode($response));
            
            $mode = $request->theme_mode;
            
            if ($mode == 'dark') {
            $js =" $($('[data-toggle=mode]').find('i')[0]).removeClass('fas').addClass('far');
                $('aside')
                    .removeClass('sidebar-light-info')
                    .addClass('sidebar-dark-info', { duration: 100 }); ";
            } else {
            $js ="$($('[data-toggle=mode]').find('i')[0]).removeClass('far').addClass('fas');
                $('aside')
                    .removeClass('sidebar-dark-info')
                    .addClass('sidebar-light-info', { duration: 100 }); ";
            }

            $js .= " $('body').toggleClass('dark-mode', { duration: 10 }); ";
                    
            if ($response['status'] === 'error') {
                return response()->json([
                    'js' => "_confirm('alert', 'Cannot continue, please call system administrator!');"
                ]);
            }
            
            return response()->json([
                'js' => $js,
                'mode' => $mode
            ]);

        } catch (Exception $e) {
            Log::channel('info')->info($e->getMessage());
        }
    }
}