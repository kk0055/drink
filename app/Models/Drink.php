<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Drink extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function user()
{
    return $this->belongsTo(User::class);
}

public function favorited()
{
    return (bool) Favorite::where('user_id', Auth::id())
                        ->where('drink_id', $this->id)
                        ->first();
}


}



