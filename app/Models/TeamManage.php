<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class TeamManage extends Model
{
    use HasFactory, HasUuids;
    
    protected $table = "team_manages";

    protected $fillable = [
        'id',
        'information_id',
        'team_id',
        'user_id'
    ];

    public function user(): HasOne
    {
        return $this->hasOne(User::class, "id", "user_id");
    }

    public function team(): HasOne
    {
        return $this->hasOne(Team::class, "id", "team_id");
    }

    public function information(): HasOne
    {
        return $this->hasOne(Information::class, "id", "information_id");
    }
}
