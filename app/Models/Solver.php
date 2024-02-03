<?php

namespace App\Models;

use App\Models\User;
use App\Models\Challenge;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Model;

class Solver extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'id',
        'user_id',
        'challenge_id',
    ];

    public function challenge(): HasOne
    {
        return $this->hasOne(Challenge::class, "id", "challenge_id");
    }

    public function user(): HasOne
    {
        return $this->hasOne(User::class, "id", "user_id");
    }
}
