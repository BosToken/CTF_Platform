<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Information extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'informations';
    protected $fillable = [
        'id',
        'information',
        'description'
    ];

    public function challenges(): HasMany
    {
        return $this->hasMany(Challenge::class, "information_id", "id");
    }
}
