<?php

namespace App\Models;

use App\Traits\QueryControl;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Intervention\Image\ImageManagerStatic as InterventionImage;

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

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function favorited()
    {
        return (bool) Favorite::where('user_id', Auth::id())
            ->where('drink_id', $this->id)
            ->first();
    }

    public function getFile(Request $request) {
        if ($request->hasFile('image')) {

            //名前設定
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;

            //InterventionImageを使わない場合に使用
            // $request->file('image')->storeAs('public/images/', $fileNameToStore);

                        //storage_path...Storageに保存される. public_path...publicに保存される.publicに保存すべきではない。
            //画像を保存するパス(Storage上)
            $filePath = storage_path('app/public/images/');

            $image = InterventionImage::make($request->file('image'))->resize(1000, 1000, function ($constraint) {
                $constraint->aspectRatio();
            });
            //InterventionImageを保存する場合はあらかじめ指定するdirectlyがstorage内に必要
            $image->save($filePath . $fileNameToStore);

            //storageを含めたパス全体を保存すれば呼び出しが簡単 /storageにしないとパスが切れる
           return $saveImageToDB = "/storage/images/" . $fileNameToStore;


        } else {
            return $saveImageToDB = null;
        }
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
