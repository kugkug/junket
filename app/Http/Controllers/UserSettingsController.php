<?php

namespace App\Http\Controllers;

use App\Helpers\GlobalHelper;
use App\Models\UserSettings;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class UserSettingsController extends Controller
{
 
    public function update(Request $request, UserSettings $userSettings) {

        try {
            $response = apiHelper()->execute($request, '/api/settings/update-mode', 'POST');
            if ($response['status'] === 'error') {
                return globalHelper()->ajaxErrorResponse();
            }

            $mode = $request->theme_mode;

            if ($mode == 'dark') {
            $js =" $($('[data-toggle=mode]').find('i')[0]).removeClass('fas').addClass('far');
                $('aside')
                    .removeClass('sidebar-light-info')
                    .addClass('sidebar-dark-info', { duration: 100 }); 
                    theme = 'dark';
                ";
            } else {
            $js ="$($('[data-toggle=mode]').find('i')[0]).removeClass('far').addClass('fas');
                $('aside')
                    .removeClass('sidebar-dark-info')
                    .addClass('sidebar-light-info', { duration: 100 }); 
                    theme = 'light';
                ";
            }

            $js .= " $('body').toggleClass('dark-mode', { duration: 10 }); ";

            return globalHelper()->ajaxSuccessResponse($js);

        } catch (Exception $e) {
            Log::channel('info')->info($e->getMessage());
            return globalHelper()->webErrorResponse();
        }
    }

}