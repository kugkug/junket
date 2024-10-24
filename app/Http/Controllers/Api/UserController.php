<?php

namespace App\Http\Controllers\Api;

use App\Exceptions\GlobalException;
use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function registerAdminUser(Request $request) {
        try {
            $admin_data = Validator::make($request->all(), [
                'firstname' => 'required|max:255',
                'middlename' => 'sometimes|max:255',
                'lastname' => 'required|max:255',
                'email' => 'required|email|max:255',
                'password' => 'required|max:255',
                'user_type' => 'required',
                'status' => 'required|integer',
            ]);
            
            if ($admin_data->fails()) {
                throw new GlobalException($admin_data->errors()->first());
            }

            $admin_saved = User::create($admin_data->validated());
            return response()->json($admin_saved);
            
        } catch(GlobalException $ge) {
            Log::channel('info')->info($ge->getMessage());
            throw new GlobalException($ge->getMessage());
        } catch (Exception $e) {
            Log::channel('info')->info($e->getMessage());
            throw new GlobalException();
        }
    }

    public function loginAdminUser(Request $request) {
        
        try {
            $user_types = config('custom.user_type');
            $admin_data = $request->validate([
                'email' => 'required|email',
                'password' => 'required',
            ]);
    
            if (! Auth::attempt($admin_data)) {
                throw new GlobalException('Invalid Username or Password', 400);
            }

            $user = User::where('email', $admin_data['email'])->first();

            return response()->json([
                'status' => 'ok',
                'info' => [
                    'user_id' => Auth::id(),
                    'access_token' => $user->createToken('api_token')->plainTextToken,
                    'token_type' => 'Bearer',
                    'user_type' => strtolower($user_types[$user->user_type])
                ],
            ]);
        } catch(GlobalException $ge) {
            Log::channel('info')->info($ge->getMessage());
            throw new GlobalException('Invalid Username or Password', 400);
        } catch (Exception $e) {
            Log::channel('info')->info($e->getMessage());
            throw new GlobalException('Invalid Username or Password', 400);
        }
    }

    public function logoutAdminUser(Request $request) {

        try {
            $request->user()->tokens()->delete();
            // Auth::user()->currentAccessToken()->delete();
            
            return response()->json([
                'status' => 'ok',
                'info' => [],
            ]);
        } catch(GlobalException $ge) {
            Log::channel('info')->info($ge->getMessage());
            throw new GlobalException('Cannot continue, please call system administrator', 400);
        } catch (Exception $e) {
            Log::channel('info')->info($e->getMessage());
            throw new GlobalException('Cannot continue, please call system administrator', 400);
        }
    }
}