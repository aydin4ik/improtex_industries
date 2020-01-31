<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;



class About extends Model
{
    // Make Model translatable.
    use Translatable;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'about';

    /**
     * Columns which should have translations.
     *
     * @var array
     */
    protected $translatable = ['title', 'subtitle', 'body'];

}