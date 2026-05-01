<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Absence extends Model
{
     protected $fillable = ['user_id', 'fecha', 'tipo', 'descripcion'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
