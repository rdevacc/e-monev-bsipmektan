<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Laravel\Scout\Searchable;

class Activity extends Model
{
    use HasFactory, Searchable;

    protected $fillable = [
        'user_id',
        'division_id',
        'department_id',
        'name',
        'budget',
        'financial_target',
        'financial_realization',
        'physical_target',
        'physical_realization',
        'dones',
        'problems',
        'follow_up',
        'todos',
    ];

    protected $casts = [
        'dones' => 'array',
        'problems' => 'array',
        'follow_up' => 'array',
        'todos' => 'array',
    ];

    protected function dones(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => json_decode($value, true),
            set: fn ($value) => json_encode($value),
        );
    }

    protected function problems(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => json_decode($value, true),
            set: fn ($value) => json_encode($value),
        );
    }

    protected function followUp(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => json_decode($value, true),
            set: fn ($value) => json_encode($value),
        );
    }

    protected function todos(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => json_decode($value, true),
            set: fn ($value) => json_encode($value),
        );
    }

    // Relationship to User table
    public function user(): BelongsTo
    {
        return $this->BelongsTo(User::class);
    }

    // Relationship to Department table
    public function department(): BelongsTo
    {
        return $this->BelongsTo(Department::class);
    }

    // Relationship to Division table
    public function division(): BelongsTo
    {
        return $this->BelongsTo(Division::class);
    }

    public function toSearchableArray()
    {
        return [
            'name' => $this->name,
            'dones' => $this->dones,
        ];
    }
}
