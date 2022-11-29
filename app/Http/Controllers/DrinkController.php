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

        $new = new Drink();

        $drink = Drink::create([
            'name' => $request->name,
            'user_id' => '1',
            'prefecture' => $request->prefecture,
            'review' => $request->review,
            'score' => $request->score,
            'place' => $request->place,
            'map_url' => $request->map_url,
            'price' => $request->price,
            'image' => $new->getFile($request),
        ]);

        $tag_id = request()->tag_id;
        if ($tag_id) {
            foreach ($tag_id as $key => $id) {
                $drink->tags()->sync($id, false);
            }
        }
        return $drink;
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
