<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Message extends Model
{
    use HasFactory;
    public function user()
    {
        return $this->belongsTo(User::class); // autor
    }

    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class); // participantes N:M
    }
}
