<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;
use Nicolaslopezj\Searchable\SearchableTrait;


class Project extends Model
{
    // Make Model translatable.
    use Translatable;

    /**
     * Columns which should have translations.
     *
     * @var array
     */
    protected $translatable = ['title', 'excerpt', 'body', 'scope', 'progress'];

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }


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
            'projects.title' => 10,
            'projects.scope' => 10,
            'projects.excerpt' => 5,
            'projects.body' => 5,
            'projects.contractor' => 5,
        ]
    ];


    /**
     * Scope a query to only published scopes.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopePublished(Builder $query)
    {
        return $query->where('status', '=', static::PUBLISHED);
    }
}
