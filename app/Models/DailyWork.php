<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DailyWork extends Model
{
    use HasFactory;
    protected $fillable = [
        'work_id',
        'reporte',
        'date',
        'evaluation',
        'Incidences',
    ];
    public function group()
    {
        return $this->belongsTo(Group::class);
    }
}
