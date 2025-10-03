<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Holder extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'birthday', 'age', 'rate', 'spend_percent', 'save_percent', 'give_percent', 'user_id'];

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

}
