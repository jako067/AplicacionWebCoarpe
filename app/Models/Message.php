<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\User;

class Message extends Model
{
public function user()
{
    return $this->belongsTo(User::class); // autor
}

public function users(): BelongsToMany
{
    return $this->belongsToMany(User::class); // participantes N:M
}
}
