<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model as Eloquent;

class CatalogProduct extends Eloquent
{
    protected $connection = 'mongodb';

    protected $collection = 'catalog_products';

    /**
     *
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
