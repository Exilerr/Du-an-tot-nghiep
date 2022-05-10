<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostTags extends Model
{
    use HasFactory;
    protected $table = 'PostTags';
    public function post()
    {
        return $this->belongsTo(Post::class);
    }
    public function tag()
    {
        return $this->belongsTo(Tag::class);
    }
}
