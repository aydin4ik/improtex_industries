<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;


class Scope extends Model
{
    // Make Model translatable.
    use Translatable;

    /**
     * Columns which should have translations.
     *
     * @var array
     */
    protected $translatable = ['title', 'excerpt', 'body'];

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
