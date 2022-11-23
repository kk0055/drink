<?php

namespace App\Http\Controllers;

use App\Models\Drink;
use App\Models\Favorite;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManagerStatic as InterventionImage;

class DrinkController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware(['auth'])->only(['store', 'destroy', 'edit']);
    // }

    public function index()
    {

        return Drink::queryControl()->queryFilter()->latest()->get();

    }

    public function create()
    {
        return view('drinks.create');
    }

    public function store(Request $request)
    {

        // $this->validate($request, [
        //     'name' => 'required',
        //     'body' => 'required|max:300',
        //     'score' => 'required',
        //     'place' => 'required',
        //     'image' => 'required',
        // ],
        //     [
        //         'name.required' => '何飲んだの？',
        //         'body.required' => '感想教えてね',
        //         'body.max' => '300文字までだよ',
        //         'score.required' => '何点？？？',
        //         'image.required' => '画像のせてくれ',
        //         'place.required' => 'どこで買ったのか教えてよ～',
        //     ]);

        if ($request->hasFile('image')) {

            //名前設定
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;

            //InterventionImageを使わない場合に使用
            // $request->file('image')->storeAs('public/images/', $fileNameToStore);

            //storageを含めたパス全体を保存すれば呼び出しが簡単 /storageにしないとパスが切れる
            $saveImageToDB = "/storage/images/" . $fileNameToStore;

            //storage_path...Storageに保存される. public_path...publicに保存される.publicに保存すべきではない。
            //画像を保存するパス(Storage上)
            $filePath = storage_path('app/public/images/');

            $image = InterventionImage::make($request->file('image'))->resize(1000, 1000, function ($constraint) {
                $constraint->aspectRatio();
            });
            //InterventionImageを保存する場合はあらかじめ指定するdirectlyがstorage内に必要
            $image->save($filePath . $fileNameToStore);
        } else {
            $saveImageToDB = null;
        }

        return Drink::create([
            'name' => $request->name,
            'user_id' => '1',
            'prefecture' => $request->prefecture,
            'review' => $request->review,
            'score' => $request->score,
            'place' => $request->place,
            'map_url' => $request->map_url,
            'price' => $request->price,
            'image' => $saveImageToDB,
        ]);
        // $request->user()->drinks()->create([
        //     'name' => $request->name,
        //     'review' => $request->review,
        //     'score' => $request->score,
        //     'place' => $request->place,
        //     'image' => $fileNameToStore,

        // ]);

        // return redirect()->route('drinks.index')->with('info', 'ごちそうさまでした！');
    }

    public function show($drink)
    {
        $favorites = Favorite::where('drink_id', $drink)->get();
        $count = count($favorites);
        // $drink = Drink::findOrFail($drink);
        return Drink::queryControl()->findOrFail($drink);
    }

    /**
     * Delete the item
     *
     */
    public function destroy($drink)
    {

        $drink = Drink::findOrFail($drink);
        return $drink->delete();

    }

    public function ranking()
    {

        $drinks = Drink::orderBy('score', 'desc')->simplePaginate(8);

        return view('drinks.ranking', [
            'drinks' => $drinks,

        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     */
    public function edit($drink)
    {

        $item = Drink::findOrFail($drink);
        return view('drinks.edit', [
            'item' => $item,
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     */

    public function update(Request $request, $drink)
    {

        $item = Drink::findOrFail($drink);

        if ($request->hasFile('image')) {
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            $path = $request->file('image')->storeAs('public/image', $fileNameToStore);
            $image = InterventionImage::make(public_path("storage/image/{$fileNameToStore}"))->resize(1000, 1000);

            $image->save();
        } else {
            $fileNameToStore = $item->image;
        }

        $item->update([
            'name' => $request->name,
            'body' => $request->body,
            'place' => $request->place,
            'score' => $request->score,
            'image' => $fileNameToStore,
        ]);

        //    dd($request);
        return redirect()->route('drinks.index')->with('info', '編集完了!');
    }

    public function favorite(Drink $drink)
    {

        Auth::user()->favorites()->attach($drink->id);

        return back();

    }

    public function unFavorite(Drink $drink)
    {

        Auth::user()->favorites()->detach($drink->id);

        return back();

    }

    public function myFavorites()
    {
        $drinks = Auth::user()->favorites()->simplePaginate(8);

        return view('drinks.my_favorites', compact('drinks'));
    }

}
