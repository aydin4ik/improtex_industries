<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;
use TCG\Voyager\Traits\Resizable;
use Nicolaslopezj\Searchable\SearchableTrait;

class Post extends Model
{
    // Allow resizable images.
    use Resizable;

    // Make Model translatable.
    use Translatable;

    /**
     * Columns which should have translations.
     *
     * @var array
     */
    protected $translatable = ['title', 'excerpt', 'body'];

    use SearchableTrait;
    /**
     * Searchable rules.
     *
     * @var array
     */
    protected $searchable = [
        /**
         * Columns and their priority in search results.
         * Columns with higher values are more important.
         * Columns with equal values have equal importance.
         *
         * @var array
         */
        'columns' => [
            'posts.title' => 10,
            'posts.excerpt' => 10,
            'posts.body' => 2,
            'categories.name' => 2,
            // 'translations.value' => 2

        ],
        'joins' => [
            'categories' => ['categories.id','posts.category_id'],
            // 'translations' => ['translations.column_name', 'posts.title']
        ],
    ];

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * Get the category that owns the post.
     */
    public function category()
    {
        return $this->belongsTo('App\Category');
    }
}
