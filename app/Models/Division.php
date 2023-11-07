<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Division extends Model
{
    use HasFactory;

    protected $fillable = [
        'department_id',
        'name',
        'head_name',
    ];

    // Relationship to Activity table
    public function activities(): HasMany
    {
        return $this->hasMany(Activity::class);
    }

    // Relationship to User table
    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }

    // Relationship to Department table
    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class);
    }
}
