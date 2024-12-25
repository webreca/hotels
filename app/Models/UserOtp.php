<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserOtp extends Model
{
    protected $fillable = [
        'iso2',
        'dialcode',
        'phone',
        'otp',
        'otp_expires_at',
        'is_verified'
    ];

}
