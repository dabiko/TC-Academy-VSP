<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Votes extends Model
{
    use HasFactory;

    public function candidate(): BelongsTo
    {
        return $this->belongsTo(Votes::class);
    }

     public function post(): BelongsTo
    {
        return $this->belongsTo(Post::class);
    }

     public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
   protected $guarded = [];
}
