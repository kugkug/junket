<?php

namespace App\Http\Controllers\Api;

use App\Exceptions\GlobalException;
use App\Http\Controllers\Controller;
use App\Models\PlayerTransaction;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TransactionController extends Controller
{
    public function list($player_id) {
        try {
            $transactions = PlayerTransaction::where('player_id', $player_id)
            ->with('availment')
            ->orderBy('created_at', 'desc')
            ->paginate(2);
            
            return [
                'status' => 'ok',
                'list' => $transactions
            ];
                
        } catch(GlobalException $ge) {
            Log::channel('info')->info("Global : ".$ge->getMessage());
            throw new GlobalException($ge->getMessage());
        }
    }

    public function save($player_id, Request $request)
    {
        try {
            
            $validated = validatorHelper()->validate('transactions_save', $request);
            
            if ($validated['status'] === "error") {
                return $validated;
            }

            if (isset($validated['validated']['photo'])) {
                $image = $request->file('Image');
                $ext = $image->getClientOriginalExtension();
                $filename = $validated['validated']['reference_number']."_image.".$ext;
                
                $request->file('Image')->storeAs('', $filename, 'receipts_images');
                $validated['validated']['photo'] = $filename;
                
            }

            $transaction_data = array_merge($validated['validated'], ['player_id' => $player_id]);
            $transaction = PlayerTransaction::create($transaction_data);
            
            return [
                'status' => 'ok',
                'info' => $transaction
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

    public function update($trx_id, Request $request) {
        try {
            $validated = validatorHelper()->validate('transactions_update', $request);
            if ($validated['status'] === "error") {
                return $validated;
            }
            
            $trx = PlayerTransaction::find($trx_id);
            if ($trx) {
                $trx->update($validated['validated']);

                return [
                    'status' => 'ok',
                    'info' => $trx
                ];
            } else {
                return [
                    'status' => 'error',
                    'message' => globalHelper()->ajaxErrorResponse('Transaction not found!')
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