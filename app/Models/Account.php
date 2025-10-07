<?php

namespace App\Models;

use App\Enums\AccountType;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $casts = [
        'account_type' => AccountType::class,
    ];

    protected $fillable = ['nickname', 'account_type', 'holder_id'];
}
