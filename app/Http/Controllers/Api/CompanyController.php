<?php

declare(strict_types=1);
namespace App\Http\Controllers\Api;

use App\Exceptions\GlobalException;
use App\Helpers\GlobalHelper;
use App\Http\Controllers\Controller;
use App\Models\Company;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
{
    public function list(Request $request) {
        try {
            $companies = Company::orderBy('name', 'asc')->paginate(2);
            
            return [
                'status' => 'ok',
                'list' => $companies
            ];
                
        } catch(GlobalException $ge) {
            Log::channel('info')->info("Global : ".$ge->getMessage());
            throw new GlobalException($ge->getMessage());
        }
    }
    
    public function save(Request $request): array {
        try {
            $validated = validatorHelper()->validate('company_save', $request);
            
            if ($validated['status'] === "error") {
                return $validated;
            }

            if (isset($validated['validated']['photo'])) {
                $image = $request->file('Image');
                $ext = $image->getClientOriginalExtension();
                $filename = $validated['validated']['code']."_image.".$ext;
                $filename = $request->file('Image')->storeAs('', $filename, 'companies_images');

                $validated['validated']['photo'] = $validated['validated']['code']."_image.".$ext;
            }

            $company = Company::create($validated['validated']);
            
            return [
                'status' => 'ok',
                'info' => $company
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
}