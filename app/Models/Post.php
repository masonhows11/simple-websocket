<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    //

    protected $fillable = ['title', 'body', 'user_id'];

    /**
     * Write code on Method
     *
     * @return BelongsTo()
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
