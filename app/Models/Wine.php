<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;
use App\Filters\QueryFilter;
use Illuminate\Database\Eloquent\Builder;

class Wine extends Model
{
    use Translatable;

    protected $translatable = ['title'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function color()
    {
        return $this->belongsTo('App\Models\Color', 'color_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function sugar()
    {
        return $this->belongsTo('App\Models\Sugar', 'sugar_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function sort()
    {
        return $this->belongsTo('App\Models\GrapeSort', 'grape_sort_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function region()
    {
        return $this->belongsTo('App\Models\Region', 'region_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function winery()
    {
        return $this->belongsTo('App\Models\Winery', 'winery_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function manufacture()
    {
        return $this->belongsTo('App\Models\Manufacturer', 'manufacturer_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function excerpt()
    {
        return $this->belongsTo('App\Models\Excerpt', 'excerpt_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function wine_class()
    {
        return $this->belongsTo('App\Models\WineClass', 'class_id', 'id');
    }

    public function scopeFilter(Builder $builder, QueryFilter $filters)
    {
        return $filters->apply($builder);
    }

    // В модели Wine.php
    public function scopeSearch($query, $search)
    {
        if ($search) {
            return $query->where('title', 'like', '%'.$search.'%')
                ->orWhere('model', 'like', '%'.$search.'%')
                ->orWhere('price', 'like', '%'.$search.'%');
        }

        return $query;
    }
}

