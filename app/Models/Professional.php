<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Professional extends Model
{
    protected $fillable = [
        'user_id',
        'bio',
        'average_price',
        'category_id',
        'profile_picture',
    ];

    public function user() :BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}

