<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\QueryControl;

class Tag extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function drinks()
    {
        return $this->belongsToMany(Drink::class);
    }

    public function scopeQueryFilter($query)
    {
 
    }
}
