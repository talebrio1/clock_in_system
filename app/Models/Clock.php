<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Clock extends Model
{
    use HasFactory;
    
    protected $table = 'clocks';


    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function scopeSearch($query,$search)
    {
        $query->where("clock_in",'LIKE','%'. $search . '%');
    }
}
