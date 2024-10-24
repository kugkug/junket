<?php

declare(strict_types=1);

namespace App\Http\Controllers\Api;

use App\Exceptions\GlobalException;
use App\Http\Controllers\Controller;
use App\Models\UserSettings;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class UserSettingsController extends Controller
{
    public function update_mode(Request $request): array {
    
        try {
            $validated = Validator::make($request->all(), [
                'theme_mode' => 'required|max:255',
            ]);            
            
            if ($validated->fails()) {
                throw new GlobalException($validated->errors()->first());
            }

            $user_settings = UserSettings::updateOrCreate(
                ['user_id' => Auth::id()],
                $validated->validated()
            );

            return [
                'status' => 'ok',
                'info' => $user_settings
            ];

        } catch(GlobalException $ge) {
            Log::channel('info')->info($ge->getMessage());
            throw new GlobalException($ge->getMessage());
        } catch (Exception $e) {
            Log::channel('info')->info($e->getMessage());
            throw new GlobalException();
        }
        
    }
}