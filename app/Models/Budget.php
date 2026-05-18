<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Budget extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_budget';
    // public function user()
    // {
    //     return $this->belongsTo(User::class, 'user_id', 'id');
    // }
    public function materials()
    {
        return $this->belongsToMany(Material::class, 'budget_material', 'budget_id', 'material_id')
            ->withPivot('quantity')
            ->withTimestamps();
    }
}
