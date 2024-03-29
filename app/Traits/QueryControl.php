<?php

namespace App\Traits;


trait QueryControl {
    /**
     * Append datas
     */
    public function scopeQueryControl($query)
    {
        return $query
        ->when(request()->query('select'), function ($query, $csv) {
            return $query->select(explode(',', $csv));
        })
        ->when(request()->query('with'), function ($query, $csv) {
            return $query->with(explode(',', $csv));
        })
        ->when(request()->query('withCount'), function ($query, $csv) {
            return $query->withCount(explode(',', $csv));
        })
        ->when(request()->query('limit'), function ($query, $val) {
            return $query->limit($val);
        });
    }

    /**
     * Please Override in Model
     */
    public function scopeQueryFilter($query)
    {
        return $query;
    }

    /**
     * count(), paginate() and get() supported.
     */
    public function scopeQueryGet($query)
    {
        $count = request()->query('count', false);
        $paginate = request()->query('paginate', false);

        if ($count) {
            return $query->count();
        }
        if ($paginate) {
            return $query->paginate((int) $paginate);
        }
        return $query->get();
    }
}