<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Post extends Model
{
    use HasFactory,Notifiable;
    protected $fillable=[
        'title',
        'post_text',
        'likes'
    ];
    /**
     * @var mixed
     */

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function tags() {
        return $this->belongsToMany(Tag::class);
    }
}
