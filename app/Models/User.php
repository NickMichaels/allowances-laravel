<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Account;
use App\Enums\AccountType;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'birthday',
        'age',
        'rate',
        'spend_percent',
        'save_percent',
        'give_percent',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public static function create($data)
    {
        $model = static::query()->create($data);

        // Now create accounts for the user
        $account_types = AccountType::values();

        foreach ($account_types as $k => $v) {
            $account_data = [
                'nickname' => $data['name'] . "'s " . ucfirst($k) . " Account",
                'account_type' => $k,
                'user_id' => $model->id,
            ];
            $user = Account::create($account_data);
        }

        return $model;
    }

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
