<?php

namespace App\Http\Controllers\Api;

use App\Exceptions\GlobalException;
use App\Http\Controllers\Controller;
use App\Models\Player;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class PlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function list()
    {
        try {
            $players = Player::orderBy('lastname', 'asc')
            ->with('nationality')
            ->with('transactions')
            ->with('agent')
            ->paginate(5);
            
            return [
                'status' => 'ok',
                'list' => $players
            ];
                
        } catch(GlobalException $ge) {
            Log::channel('info')->info("Global : ".$ge->getMessage());
            throw new GlobalException($ge->getMessage());
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function save(Request $request)
    {
        try {
            $validated = validatorHelper()->validate('players_save', $request);
                        
            if ($validated['status'] === "error") {
                return $validated;
            }

            $player_code = globalHelper()->genPlayerCode();
            $status = 1;
            $checked_in_by = Auth::id();

            if (isset($validated['validated']['photo'])) {
                $image = $request->file('Image');
                $ext = $image->getClientOriginalExtension();
                $filename = $player_code."_image.".$ext;
                $filename = $request->file('Image')->storeAs('', $filename, 'passports_images');
                // $filename = $request->file('Image')->put($filename, 'passports_images');
                // Storage::disk('passports_images')->put($filename, $image);

                $validated['validated']['photo'] = $player_code."_image.".$ext;
            }

            $player_data = array_merge($validated['validated'], [
                'player_code' => $player_code,
                'status' => $status,
                'checked_in_by' => $checked_in_by,
            ]);

            
            $player = Player::create($player_data);
            
            return [
                'status' => 'ok',
                'info' => $player
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
                    'message' => 'Duplicate entry for company with code: '. $validated['validated']['code']
                ];
            }
            
            // throw new GlobalException();
            
        } catch (Exception $e) {
            Log::channel('info')->info("Exception : ".$e->getMessage());
            throw new GlobalException();
        }
    }

    public function update($id, Request $request) {
        try {
            $validated = validatorHelper()->validate('players_update', $request);
            if ($validated['status'] === "error") {
                return $validated;
            }
            
            $player = Player::find($id);
            if ($player) {
                $player->update($validated['validated']);

                return [
                    'status' => 'ok',
                    'info' => $player
                ];
            } else {
                return [
                    'status' => 'error',
                    'message' => globalHelper()->ajaxErrorResponse('Player not found!')
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
                    'message' => 'Duplicate entry for player'
                ];
            }

            throw new GlobalException();
            
        } catch (Exception $e) {
            Log::channel('info')->info("Exception : ".$e->getMessage());
            throw new GlobalException();
        }
    }
}