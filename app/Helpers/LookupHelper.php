<?php

declare(strict_types=1);
namespace App\Helpers;

use App\Models\Company;
use App\Models\Nationality;
use App\Models\Player;
use App\Models\Position;
use App\Models\User;

class LookupHelper {

    public function getCompanies() {
        return Company::orderBy('name', 'asc')->get()->toArray();
    }

    public function getPositions() {
        return Position::orderBy('position', 'asc')->get()->toArray();
    }

    public function getNationalities() {
        return Nationality::orderBy('nationality', 'asc')->get()->toArray();
    }

    public function getAccountInfoViaId($id) {
        return User::where('id', $id)->first()->toArray();
    }

    public function getPlayerInfoViaId($id) {
        return Player::where('id', $id)->with('nationality')->first()->toArray();
    }
}