<?php

declare(strict_types=1);
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class PlayerTransaction extends Model
{
    protected $guarded = [];

    public function availment(): HasOne {
        return $this->hasOne(FoodBeverage::class, 'id');
    }
}