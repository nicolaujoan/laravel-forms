<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // mass assignable attributes
    protected $fillable = ['title', 'content', 'extract', 'user_id', 'expirable', 'comentable', 'is_private'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}