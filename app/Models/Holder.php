<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Holder extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'birthday', 'age', 'rate', 'spend_percent', 'save_percent', 'give_percent', 'user_id'];

    public static function create($data) {
        // Statically generate the age and rate
        $age = DateTime::createFromFormat('Y-m-d', $data['birthday'])
            ->diff(new DateTime('now'))
            ->y;
        $rate = $age / 2;

        $data['age'] = $age;
        $data['rate'] = $rate;

        $model = static::query()->create($data);

        return $model;
    }

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

}
