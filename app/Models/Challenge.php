<?php

namespace App\Models;

use App\Models\ChallengeCategory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
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

    public function challengetable(): BelongsTo
    {
        return $this->belongsTo(ChallengeCategory::class);
    }
}
