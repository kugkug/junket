<?php

declare(strict_types=1);
namespace App\Helpers;

class KeysHelper {
    private const KEYS = [
        'Id' => "id",
        'Code' => "code",
        'Name' => "name",
        'Address' => "address",
        'ContactNo' => "phone",
        'Email' => "email",
        'Representative' => "representative",
        'Image' => "photo",
        'EmployeeID' => "emp_id",
        'FirstName' => "firstname",
        'MiddleName' => "middlename",
        'LastName' => "lastname",
        'PositionId' => "user_type",
        'Username' => "username",
        'Password' => "password",
        'Status' => "status",
        "PlayerCode"=> "player_code",
        "NationalityId"=> "nationality_id",
        "ArrivalDate"=> "arrival_date",
        "PassportImage"=> "passport_image",
        "Deposit"=> "deposit",
        "Checkout"=> "checkout",
        "AvailmentId"=> "availment_id",
        "CheckedInBy"=> "checked_in_by",
        "CheckedOutBy"=> "checked_out_by",
        "PlayerId" => "player_id",
        "AvailmentId" => "availment_id",
        "Accomodation" => "accomodation",
        "Room" => "room",
        "Restaurant" => "restaurant",
        "Foods" => "foods",
        "Receipt" => "receipt",
        "TotalAmount" => "total_amount",
        "PlayerCode" => "player_code", 
        "NationalityId" => "nationality_id", 
        "ArrivalDate" => "arrival_date", 
        "PassportNo" => "passport_number", 
        "PassportImage" => "passport_image", 
        "Deposit" => "deposit", 
        "Checkout" => "checkout", 
        "AvailmentId" => "availment_id", 
        "CheckedInBy" => "checked_in_by", 
        "CheckedOutBy" => "checked_out_by", 
    ];
    
    public function getKey(string $key_index): string {
        return self::KEYS[$key_index];
    }
}