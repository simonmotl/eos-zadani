<?php

declare (strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

final class Member extends Model
{
    use HasFactory;

    public const MEMBER_ID = 'id';
    public const MEMBER_NAME = 'name';
    public const MEMBER_SURNAME = 'surname';
    public const MEMBER_EMAIL = 'email';
    public const MEMBER_DATE_OF_BIRTH = 'date_of_birth';

    protected $fillable = [
        self::MEMBER_ID,
        self::MEMBER_NAME,
        self::MEMBER_SURNAME,
        self::MEMBER_EMAIL,
        self::MEMBER_DATE_OF_BIRTH,
    ];

    public $timestamps = false;

    public function member_tags(): BelongsToMany
    {
        return $this->belongsToMany(MemberTag::class, 'assigned_tos');
    }
}
