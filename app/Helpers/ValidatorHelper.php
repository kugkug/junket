<?php

declare(strict_types=1);
namespace App\Helpers;

use App\Exceptions\GlobalException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ValidatorHelper {
    public const EXCLUDED = ['current_user', 'current_user_settings'];
    
    public function validate(string $type, Request $request): array {
    
        $mapped = $this->key_map($request->except(self::EXCLUDED));
        
        if ($mapped['photo'] && (! $mapped['photo'] || $mapped['photo'] === "undefined")) {
            unset($mapped['photo']);
        }
                
        $validated = Validator::make($mapped, $this->rules($type));
        
        if ($validated->fails()) {
            return [
                'status' => 'error',
                'message' => $validated->errors()->first(),
            ];
        }

        return [
            'status' => 'ok',
            'validated' => $validated->validated(),
        ]; 
    }

    private function key_map($to_map): array {

        $mapped = [];
        foreach($to_map as $key => $value) {
            if($value) {
                $mapped[keyHelper()->getKey($key)] = $value;
            }
        }

        return $mapped;
    }

    private function rules(string $type) {
        switch($type) {

            case 'company_save':
                return [
                    'photo' => "sometimes|image|mimes:jpeg,png,jpg,gif|max:2048",
                    'code' => "required|string|max:255",
                    'name' => "required|string|max:255",
                    'address' => "required|string|max:255",
                    'phone' => "required|string|max:255",
                    'email' => "required|email|max:255",
                    'representative' => "required|string|max:255",
                ];
            break;
        }
    }
}