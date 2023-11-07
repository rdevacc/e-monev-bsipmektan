<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Department extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'head_name',
        'budget',
    ];

    // protected $casts = [
    //     'budget' => 'double:2'
    // ];

    // protected function budget(): Attribute
    // {
    //     return Attribute::make(
    //         get: fn ($value) => $value
    //     );
    // }

    // Relationship to Activity table
    public function activities(): HasMany
    {
        return $this->hasMany(Activity::class);
    }

    // Relationship to User table
    public function user(): HasMany
    {
        return $this->hasMany(User::class);
    }

    // Relationship to Division table
    public function division(): HasMany
    {
        return $this->hasMany(Division::class);
    }
}
