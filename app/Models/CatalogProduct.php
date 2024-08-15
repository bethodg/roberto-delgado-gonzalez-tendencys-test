<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model as Eloquent;

class CatalogProduct extends Eloquent
{
    protected $connection = 'mongodb'; // Especifica la conexión a MongoDB

    protected $collection = 'catalog_products'; // Especifica la colección

    /**
     * Los atributos que son asignables en masa.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'height',
        'length',
        'width',
    ];
}
