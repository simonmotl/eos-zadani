<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class MemberTag extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function assignedToMembers(): HasMany
    {
        return $this->hasMany(AssignedTo::class);
    }
}
