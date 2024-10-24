<?php

declare(strict_types=1);
namespace App\Helpers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class ApiHelper {
    
    public static function execute(Request $request, string $url, string $request_type): array {
        $api_call = $request->create($url, $request_type);
        $response = Route::dispatch($api_call);
        
        return json_decode($response->getContent(), true);
    }

    public static function custom_session(Request $request, string $action, mixed $session_data): mixed {
        switch($action) {
            case 'set':
                foreach($session_data as $key => $value) {
                    $request->session()->put($key, $value);
                }
                
                break;
            case 'get':
                return $request->session()->get($session_data);
                break;
            
            case 'flush':
                    $request->session()->flush();
                break;
        } return true;
    }
}