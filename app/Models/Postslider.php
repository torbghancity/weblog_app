<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Postslider extends Model
{
    use HasFactory;

    public function posts_slider()
    {
        return $this->belongsTo(Post::class);
    }
}
