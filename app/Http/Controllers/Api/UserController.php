<?php

namespace App\Http\Controllers\Api;

use App\Exceptions\GlobalException;
use App\Http\Controllers\Controller;
use App\Models\User;
use Exception;
use Illuminate\Database\QueryException;
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

    public function login(Request $request) {
        
        try {
            $key = 'email';
            $user_types = config('custom.user_type');

            $admin_data = $request->validate([
                'email' => 'required|string',
                'password' => 'required',
            ]);
    
            if (! Auth::attempt($admin_data)) {
                $key = 'username';
                // throw new GlobalException('Invalid Username or Password', 400);
                $admin_data = [
                    'username' => $admin_data['email'],
                    'password' => $admin_data['password'],
                ];

                if (! Auth::attempt($admin_data)) {
                    throw new GlobalException('Invalid Username or Password', 400);
                }
            }

            $user = User::where($key, $admin_data[$key])->first();

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
            throw new GlobalException('Invalids Username or Password', 400);
        } catch (Exception $e) {
            Log::channel('info')->info($e->getMessage(), $e->getTrace());
            throw new GlobalException();
        }
    }

    public function logout(Request $request) {

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

    public function getNonAdminUser(Request $request) {
        try {
            $admin_key = array_search('Admin', config('custom.user_type'));
            $users = User::where('user_type', '!=', $admin_key)
            ->with('company')
            ->orderBy('firstname', 'asc')->paginate(1);
            
            return [
                'status' => 'ok',
                'list' => $users
            ];
                
        } catch(GlobalException $ge) {
            Log::channel('info')->info("Global : ".$ge->getMessage());
            throw new GlobalException($ge->getMessage());
        }
    }

    // Accounts REgistration
    public function registerNonAdminUser(Request $request) {
        try {

            $validated = validatorHelper()->validate('accounts_save', $request);
            
            if ($validated['status'] === "error") {
                return $validated;
            }
            
            $username = strtolower($validated['validated']['code'].".".$validated['validated']['emp_id']);
            $password = globalHelper()->genDefaultPassword();
            $status = 1;

            $user_data = array_merge($validated['validated'], 
                [
                    'company_code' => $validated['validated']['code'],
                    'username' => $username, 
                    'password' => $password, 
                    'status' => $status,
                ]
            );

            unset($user_data['code']);
            
            $user = User::create($user_data);

            return [
                'status' => 'ok',
                'username' => $user['username'],
                'password' => $password,
            ];
            
        } catch(GlobalException $ge) {
            Log::channel('info')->info("Global : ".$ge->getMessage());
            throw new GlobalException($ge->getMessage());
        } catch(QueryException $qe) {
            
            Log::channel('info')->info("Exception : ".$qe->getMessage());
            $errorCode = $qe->errorInfo[1];
            if($errorCode == 1062){
                return [
                    'status' => 'error',
                    'message' => 'Duplicate entry for user with employee: '. $validated['validated']['emp_id'] . ' and email : '.$validated['validated']['email']
                ];
            }

            throw new GlobalException();
            
        } catch (Exception $e) {
            Log::channel('info')->info("Exception : ".$e->getMessage());
            throw new GlobalException();
        }
    }

    public function updateNonAdminUser($id, Request $request) {
        try {

            $validated = validatorHelper()->validate('accounts_update', $request);
            if ($validated['status'] === "error") {
                return $validated;
            }

            $username = strtolower($validated['validated']['code'].".".$validated['validated']['emp_id']);
            $password = globalHelper()->genDefaultPassword();
            $status = 1;

            $user_data = array_merge($validated['validated'], 
                [
                    'company_code' => $validated['validated']['code'],
                    'username' => $username, 
                    'password' => $password, 
                    'status' => $status,
                ]
            );

            unset($user_data['code']);

            $user = User::find($id);
            if ($user) {
                $user->update($user_data);

                return [
                    'status' => 'ok',
                    'info' => $user
                ];
            } else {
                return [
                    'status' => 'error',
                    'message' => globalHelper()->ajaxErrorResponse('User not found!')
                ];
            }
            
        } catch(GlobalException $ge) {
            Log::channel('info')->info("Global : ".$ge->getMessage());
            throw new GlobalException($ge->getMessage());
        } catch(QueryException $qe) {
            
            Log::channel('info')->info("Exception : ".$qe->getMessage());
            $errorCode = $qe->errorInfo[1];
            if($errorCode == 1062){
                return [
                    'status' => 'error',
                    'message' => 'Duplicate entry for user with employee: '. $validated['validated']['emp_id'] . ' and email : '.$validated['validated']['email']
                ];
            }

            throw new GlobalException();
            
        } catch (Exception $e) {
            Log::channel('info')->info("Exception : ".$e->getMessage());
            throw new GlobalException();
        }
    }

    public function resetNonAdminUser($id, Request $request) {
        try {

            $password = globalHelper()->genDefaultPassword();
            $user = User::find($id);
            if ($user) {
                $user->update(['password' => $password]);

                return [
                    'status' => 'ok',
                    'info' => $password
                ];

            } else {
                return [
                    'status' => 'error',
                    'message' => globalHelper()->ajaxErrorResponse('User not found!')
                ];
            } 
            
        } catch(GlobalException $ge) {
            Log::channel('info')->info("Global : ".$ge->getMessage());
            throw new GlobalException($ge->getMessage());
        } catch(QueryException $qe) {
            
            Log::channel('info')->info("Exception : ".$qe->getMessage());
            $errorCode = $qe->errorInfo[1];
            if($errorCode == 1062){
                return [
                    'status' => 'error',
                    // 'message' => 'Duplicate entry for user with employee: '. $validated['validated']['emp_id'] . ' and email : '.$validated['validated']['email']
                ];
            }

            throw new GlobalException();
            
        } catch (Exception $e) {
            Log::channel('info')->info("Exception : ".$e->getMessage());
            throw new GlobalException();
        }
    }

    public function deleteNonAdminUser($id, Request $request) {
        try {

            $user = User::find($id);
            if ($user) {
                $user->update(['status' => 6]);

                return [
                    'status' => 'ok',
                    'info' => ''
                ];
            } else {
                return [
                    'status' => 'error',
                    'message' => globalHelper()->ajaxErrorResponse('User not found!')
                ];
            } 
            
        } catch(GlobalException $ge) {
            Log::channel('info')->info("Global : ".$ge->getMessage());
            throw new GlobalException($ge->getMessage());
        } catch(QueryException $qe) {
            
            Log::channel('info')->info("Exception : ".$qe->getMessage());
            $errorCode = $qe->errorInfo[1];
            if($errorCode == 1062){
                return [
                    'status' => 'error',
                    // 'message' => 'Duplicate entry for user with employee: '. $validated['validated']['emp_id'] . ' and email : '.$validated['validated']['email']
                ];
            }

            throw new GlobalException();
            
        } catch (Exception $e) {
            Log::channel('info')->info("Exception : ".$e->getMessage());
            throw new GlobalException();
        }
    }
}