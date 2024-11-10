<?php

namespace App\Http\Controllers\Api;

use App\Exceptions\GlobalException;
use App\Http\Controllers\Controller;
use App\Models\Agent;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AgentController extends Controller
{
    public function list()
    {
        try {
            $agents = Agent::orderBy('lastname', 'asc')->paginate(5);
            
            return [
                'status' => 'ok',
                'list' => $agents
            ];
                
        } catch(GlobalException $ge) {
            Log::channel('info')->info("Global : ".$ge->getMessage());
            throw new GlobalException($ge->getMessage());
        }
    }
    
    public function save(Request $request)
    {
        try {
            $validated = validatorHelper()->validate('agents_save', $request);
                        
            if ($validated['status'] === "error") {
                return $validated;
            }

            $agent_code = globalHelper()->genAgentCode();
            $status = 1;


            $agent_data = array_merge($validated['validated'], [
                'agent_code' => $agent_code,
                'status' => $status,
            ]);

            
            $agent = Agent::create($agent_data);
            
            return [
                'status' => 'ok',
                'info' => $agent
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
                    'message' => 'Duplicate entry for agent with email: '. $validated['validated']['email']
                ];
            }
            
            // throw new GlobalException();
            
        } catch (Exception $e) {
            Log::channel('info')->info("Exception : ".$e->getMessage());
            throw new GlobalException();
        }
    }
}