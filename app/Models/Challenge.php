<?php

namespace App\Models;

use App\Models\Solver;
use App\Models\ChallengeCategory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

class Challenge extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'challenges';
    protected $fillable = [
        'id',
        'name',
        'challenge_categories_id',
        'message',
        'flag',
        'file',
        'value',
        'solver',
        'challenge_type'
    ];

    public function category(): HasOne
    {
        return $this->hasOne(ChallengeCategory::class, "id", "challenge_categories_id");
    }

    public function informations()
    {
        return $this->hasOne(Information::class, 'id', 'information_id');
    }

    public function solvers(): HasMany
    {
        return $this->hasMany(Solver::class, 'challenge_id', 'id');
    }
}
