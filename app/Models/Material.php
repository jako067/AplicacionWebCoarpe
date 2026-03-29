<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    use HasFactory;

    protected $fillable = [
        'material_id',
        'Material_name',
        'Unity_price',
        'Quantity',
        'Supplier',
        'Contact',
    ];

    protected $primaryKey = 'material_id';
    public $incrementing = true;
    protected $keyType = 'int';
}
