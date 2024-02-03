<?php

namespace App\Models;

use App\Models\Challenge;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

class ChallengeCategory extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'challenge_categories';

    protected $fillable = [
        'id',
        'name',
        'description'
    ];

    public function challenge(): HasMany
    {
        return $this->hasMany(Challenge::class, 'challenge_categories_id', 'id');
    }
}
