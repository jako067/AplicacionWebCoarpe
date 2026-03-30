<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{

    protected $fillable = [
        'material_id',
        'Material_name',
        'Unity_price',
        'Quantity',
        'Supplier',
        'Contact',
    ];

}
