<?php

declare(strict_types=1);
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Player extends Model {
    use SoftDeletes;

    protected $guarded = [];

    public function transactions(): HasMany {
        return $this->hasMany(PlayerTransaction::class, 'player_id');
    }

    public function nationality(): HasOne {
        return $this->hasOne(Nationality::class, 'id', 'nationality_id');
    }

    public function agent(): HasOne {
        return $this->hasOne(Agent::class, 'agent_code', 'agent_code');
    }
}