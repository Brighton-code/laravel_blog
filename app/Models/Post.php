<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $fillable = [
        'user_id',
        'title',
        'body',
        'img_url'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    /**
     * Returns true or false depending on if the user id is user_id
     * @return bool
     */
    public function isOwner(): bool {
        if (auth()->check()) {
            return auth()->id() === $this->user_id;
        }
        return false;
    }
}
