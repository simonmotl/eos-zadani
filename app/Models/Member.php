<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Member extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'surname',
        'email',
        'date_of_birth',
    ];

    public $timestamps = false;

    public function member_tags(): BelongsToMany
    {
        return $this->belongsToMany(MemberTag::class, 'assigned_tos');
    }
}
