<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{
    protected $fillable = [
        'id',
        'user_id',
        'body',
        'create_at',
        'updated_at',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
