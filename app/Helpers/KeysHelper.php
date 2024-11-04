<?php

declare(strict_types=1);
namespace App\Helpers;

class KeysHelper {
    private const KEYS = [
        'Code' => "code",
        'Name' => "name",
        'Address' => "address",
        'ContactNo' => "phone",
        'Email' => "email",
        'Representative' => "representative",
        'Image' => "photo",
    ];
    
    public function getKey(string $key_index): string {
        return self::KEYS[$key_index];
    }
}