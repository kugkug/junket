<?php

declare(strict_types=1);
namespace App\Helpers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;

class GlobalHelper {
 
    private static function getMessages() {
        return config('custom.messages');
    }

    private function getViewData(Request $request) {
        $themes = config('custom.theme_mode');
        
        $viewData['settings'] = $request->current_user_settings ? 
        [ 'theme_class' => $themes[$request->current_user_settings['theme_mode']] ] :
        [ 'theme_class' => $themes['light'] ];

        return $viewData;
    }

    public function webErrorResponse(string $message=''): RedirectResponse {
        $messages = self::getMessages();
        
        $msg = ( ! empty($message) ) ? $message : $messages['default'];
        return back()->withErrors([
            'message' => $msg
        ])->withInput();
    }

    public function ajaxErrorResponse(string $message='', string $url=''): JsonResponse {
        Log::channel('info')->info($message);
        $messages = self::getMessages();
        $msg = ( ! empty($message) ) ? $message : $messages['default'];
        $js = $url == "" ? 
            ['js' => "_confirm('alert', '".$msg."');"] : 
            ['js' => "_confirmAdd('".$msg."', '".$url."');"];
        return response()->json($js, 200);
    }

    public function ajaxSuccessRespone(string $scripts): JsonResponse {
        $scripts = preg_replace('/\r\n+/S', "", $scripts);
        return response()->json(['js' => $scripts], 200);
    }

    public function makeView(string $view, array $data, Request $request): View {
        return view($view, $data)->with(self::getViewData($request));
    }

}