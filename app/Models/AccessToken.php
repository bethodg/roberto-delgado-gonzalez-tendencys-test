<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model as Eloquent;

class AccessToken extends Eloquent
{
    protected $connection = 'mongodb';

    protected $collection = 'access_tokens';

    /**
     *
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'token',
    ];

    /**
     *
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', '_id');
    }
}
