<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Team extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'teams';
    protected $fillable = [
        'id',
        'name'
    ];

    public function TeamManages(): HasMany
    {
        return $this->hasMany(TeamManage::class, "team_id", "id");
    }
}
