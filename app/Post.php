<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;
use TCG\Voyager\Traits\Resizable;
use Nicolaslopezj\Searchable\SearchableTrait;
use Illuminate\Database\Eloquent\Builder;
use TCG\Voyager\Models\Translation;

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
            // 'posts.title' => 10,
            'posts.excerpt' => 10,
            'posts.body' => 2,
            'categories.name' => 2,
            'translations.value' => 2

        ],
        'joins' => [
            'categories' => ['categories.id','posts.category_id'],
            'translations' => ['translations.foreign_key', 'posts.id']
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

    /**
     * Get entries filtered by translated value.
     *
     * @example  Post::searchInTranslations('zuhause', ['title','body'])
     *
     * @param array        $columns    {required} the fields your looking to find a value in.
     * @param string       $value    {required} value you are looking for.
     *
     * @return Builder
     */
    public static function scopeSearchInTranslations($query, $value, $columns )
    {

        if ($columns && !is_array($columns)) {
            $columns = [$columns];
        }

        $self = new static();
        $table = $self->getTable();

        return $query->whereIn($self->getKeyName(), Translation::where('table_name', $table)
            ->when(!is_null($columns), function ($query) use ($columns) {
                return $query->whereIn('column_name', $columns);
            })
            ->where('value', 'like', "%$value%")
            ->pluck('foreign_key')
        );
    }
}
