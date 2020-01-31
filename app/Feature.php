<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;



class Feature extends Model
{
    // Make Model translatable.
    use Translatable;

    /**
     * Columns which should have translations.
     *
     * @var array
     */
    protected $translatable = ['name', 'measure'];
    
}
