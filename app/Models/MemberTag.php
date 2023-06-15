<?php

declare (strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

final class MemberTag extends Model
{
    use HasFactory;

    public const MEMBER_TAG_ID = 'id';
    public const MEMBER_TAG_NAME = 'name';

    protected $fillable = [
        self::MEMBER_TAG_ID,
        self::MEMBER_TAG_NAME,
    ];

    public $timestamps = false;

    public function members(): BelongsToMany
    {
        return $this->belongsToMany(Member::class, 'assigned_tos');
    }
}
