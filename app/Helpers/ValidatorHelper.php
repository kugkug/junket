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
        
        if (isset($mapped['photo']) && (! $mapped['photo'] || $mapped['photo'] === "undefined")) {
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

            case 'accounts_save':
                return [
                    'code' => "required|string|max:255",
                    'emp_id' => "required|string|max:255",
                    'firstname' => "required|string|max:255",
                    'middlename' => "required|string|max:255",
                    'lastname' => "required|string|max:255",
                    'phone' => "required|string|max:255",
                    'email' => "required|email|max:255",
                    'user_type' => "required|string|max:6",
                ];
            break;

            case 'accounts_update':
                return [
                    'code' => "sometimes|string|max:255",
                    'emp_id' => "sometimes|string|max:255",
                    'firstname' => "sometimes|string|max:255",
                    'middlename' => "sometimes|string|max:255",
                    'lastname' => "sometimes|string|max:255",
                    'phone' => "sometimes|string|max:255",
                    'email' => "sometimes|email|max:255",
                    'user_type' => "sometimes|string|max:6",
                ];
            break;

            case 'players_save':
                return [
                    'photo' => "required|image|mimes:jpeg,png,jpg,gif|max:2048",
                    'firstname' => "required|string|max:255",
                    'middlename' => "required|string|max:255",
                    'lastname' => "required|string|max:255",
                    'nationality_id' => "required|integer|max:6",
                    'arrival_date' => "required|string|max:255",
                    'deposit' => "required|string|max:255",
                ];
            break;

            case 'players_update':
                return [
                    'firstname' => "sometimes|string|max:255",
                    'middlename' => "sometimes|string|max:255",
                    'lastname' => "sometimes|string|max:255",
                    'nationality_id' => "sometimes|integer|max:6",
                    'arrival_date' => "sometimes|string|max:255",
                    'photo' => "sometimes|string|max:255",
                    'deposit' => "sometimes|string|max:255",
                    'checkout' => "sometimes|string|max:255",
                    'status' => "sometimes|integer|max:6",
                    'availment_id' => "sometimes|integer|max:6",
                    'checked_in_by' => "sometimes|string|max:255",
                    'checked_out_by' => "sometimes|string|max:255",
                ];
            break;

            case 'transactions_save':
                return [
                    'player_id' => "required|integer|max:255",
                    'availment_id' => "required|integer|max:255",
                    'accomodation' => "required|string|max:255",
                    'room' => "required|string|max:255",
                    'restaurant' => "required|string|max:255",
                    'foods' => "required|string|max:255",
                    'receipt' => "required|string|max:255",
                    'total_amount' => "required|string|max:255",
                ];
            break;

            case 'transactions_update':
                return [
                    'player_id' => "sometimes|integer|max:255",
                    'availment_id' => "sometimes|integer|max:255",
                    'accomodation' => "sometimes|string|max:255",
                    'room' => "sometimes|string|max:255",
                    'restaurant' => "sometimes|string|max:255",
                    'foods' => "sometimes|string|max:255",
                    'receipt' => "sometimes|string|max:255",
                    'total_amount' => "sometimes|string|max:255",
                ];
            break;
        }
    }
}