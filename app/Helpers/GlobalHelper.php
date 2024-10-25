<?php

declare(strict_types=1);
namespace App\Helpers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class GlobalHelper {
 
    private static function getMessages() {
        return config('custom.messages');
    }

    private static function getViewData(Request $request) {
        $themes = config('custom.theme_mode');
        
        $viewData['settings'] = $request->current_user_settings ? 
        [ 'theme_class' => $themes[$request->current_user_settings['theme_mode']] ] :
        [ 'theme_class' => $themes['light'] ];

        return $viewData;
    }

    public static function webErrorResponse(string $message=''): RedirectResponse {
        $messages = self::getMessages();
        
        $msg = ( ! empty($message) ) ? $message : $messages['default'];
        return back()->withErrors([
            'message' => $msg
        ])->withInput();
    }

    public static function ajaxErrorResponse(string $message=''): JsonResponse {
        $messages = self::getMessages();
        $msg = ( ! empty($message) ) ? $message : $messages['default'];
        return response()->json(['js' => "_confirm('alert', '".$msg."');"], 400);
    }

    public static function ajaxSuccessRespone(string $scripts): JsonResponse {
        $scripts = preg_replace('/\s+/S', "", $scripts);
        return response()->json(['js' => $scripts], 200);
    }

    public static function makeView(string $view, array $data, Request $request): View {
        return view($view, $data)->with(self::getViewData($request));
    }

}