<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model as Eloquent;

class AccessToken extends Eloquent
{
    protected $connection = 'mongodb'; // Especifica la conexión a MongoDB

    protected $collection = 'access_tokens'; // Especifica la colección

    /**
     * Los atributos que son asignables en masa.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'token',
    ];

    /**
     * Relación con el modelo User.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', '_id');
    }
}
