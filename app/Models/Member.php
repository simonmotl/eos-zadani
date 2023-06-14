<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Member extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'surname',
        'email',
        'born',
    ];

    public function assignedMemberTags(): HasMany
    {
        return $this->hasMany(AssignedTo::class);
    }
}
