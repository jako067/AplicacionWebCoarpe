<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DailyWork extends Model
{
    protected $fillable = [
        'work_id',
        'reporte',
        'date',
        'evaluation',
        'incidences',
    ];
}
