<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
   protected $primaryKey = 'material_id';
    public function budget()
    {

        return $this->belongsTo(Budget::class, 'budget_id', 'id_budget');
    }

    // public function user()
    // {
    //     return $this->belongsTo(User::class, 'user_id', 'id');
    // }
}
