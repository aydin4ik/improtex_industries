<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Resizable;
use TCG\Voyager\Traits\Translatable;


class Slide extends Model
{
    // Make Model translatable.
    use Translatable;

    // Allow resizable images.
    use Resizable;

    /**
     * Columns which should have translations.
     *
     * @var array
     */
    protected $translatable = ['title'];
}
