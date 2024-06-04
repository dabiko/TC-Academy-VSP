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
        return $this->belongsTo(Candidate::class);
    }

     public function post(): BelongsTo
    {
        return $this->belongsTo(Post::class);
    }

     public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function scopeSearch($query, $value): void
    {
        $query->where('candidate_id', 'like', "%{$value}%")
            ->orWhere('post_id', 'like', "%{$value}%")
            ->orWhere('created_at', 'like', "%{$value}%")
            ->orWhere('updated_at', 'like', "%{$value}%");
    }

   protected $guarded = [];
}
