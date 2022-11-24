<?php

namespace App\Models;

use App\Traits\QueryControl;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Drink extends Model
{
    use HasFactory;
    use QueryControl;
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function favorited()
    {
        return (bool) Favorite::where('user_id', Auth::id())
            ->where('drink_id', $this->id)
            ->first();
    }

    public function scopeQueryFilter($query)
    {
        $ranking = request()->query('ranking');
        $prefecture = request()->query('prefecture');

        return $query
            ->when($ranking, function ($query, $val) {
                return $query
                    ->orderBy('score', 'DESC');
                ;
            })
            ->when($prefecture, function ($query, $val) use ($prefecture) {
                return $query
                    ->where('prefecture', $prefecture);
                ;
            })
        ;
    }
}
