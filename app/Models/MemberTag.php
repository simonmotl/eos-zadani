<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class MemberTag extends Model
{
    use HasFactory;

    public $timestamps = false;

    public function members(): BelongsToMany
    {
        return $this->belongsToMany(Member::class, 'assigned_tos');
    }
}
