<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Drink;
use App\Models\User;
use App\Models\Favorite;
use Intervention\Image\ImageManagerStatic as InterventionImage;
use Illuminate\Support\Facades\Auth;

class DrinkController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth'])->only(['store', 'destroy','edit']);
    }

    public function index( )
    {
        
        $drinks = Drink::latest()->simplePaginate(8);
     
     
        return view('main', [
            'drinks' => $drinks,
          
        ]);
      
    }

        public function create()
    {
        return view('drinks.create');
    }

        public function store(Request $request)
    {

    

    $this->validate($request, [
    'name' => 'required',
    'body' => 'required|max:300',
    'score' => 'required',
    'place' => 'required',
    'image' => 'required'
    ],
    [
        'name.required' => '何飲んだの？',
        'body.required'  => '感想教えてね',
        'body.max'  => '300文字までだよ',
        'score.required' =>'何点？？？',
        'image.required' => '画像のせてくれ',
        'place.required' => 'どこで買ったのか教えてよ～'
    ]);

  
    if($request->hasFile('image')){
    $filenameWithExt = $request->file('image')->getClientOriginalName();
    $filename = pathinfo($filenameWithExt ,PATHINFO_FILENAME);
    $extension = $request->file('image')->getClientOriginalExtension();
    $fileNameToStore = $filename . '_'. time(). '.'.$extension;
    $path = $request->file('image')->storeAs('public/image',  $fileNameToStore);

    $image =  InterventionImage::make(public_path("storage/image/{$fileNameToStore}"))->resize(1000, 1000);
    
    $image->save();

    } else {
        $fileNameToStore = null;
        }

    $request->user()->drinks()->create([
    'name' => $request->name,
    'body' => $request->body,
    'score' => $request->score,
    'place' => $request->place,
    'image' =>  $fileNameToStore,

    ]);
   
    return redirect()->route('drinks.index')->with('info','ごちそうさまでした！');
    }

    public function show($drink)
    {
        $favorites = Favorite::where('drink_id', $drink)->get();
        $count = count( $favorites);
        $drink = Drink::findOrFail($drink);
        return view('drinks.show',[
            'drink' => $drink,
            'count' => $count
        ]);
    }

    /**
     * Delete the item
     *
     */
    public function destroy($drink)
    {

        $drink = Drink::findOrFail($drink);
        $drink->delete();

        return redirect()->route('drinks.index')->with('info','消しました!');
    }

    public function ranking()
    {

    $drinks = Drink::orderBy('score','desc')->simplePaginate(8);
    
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
        return view('drinks.edit',[
            'item' =>$item
        ]);

   }

     /**
     * Update the specified resource in storage.
     *
     */

    public function update(Request $request, $drink)
    {

   
    $item = Drink::findOrFail($drink);

    if($request->hasFile('image')){
    $filenameWithExt = $request->file('image')->getClientOriginalName();
    $filename = pathinfo($filenameWithExt ,PATHINFO_FILENAME);
    $extension = $request->file('image')->getClientOriginalExtension();
    $fileNameToStore = $filename . '_'. time(). '.'.$extension;
    $path = $request->file('image')->storeAs('public/image',  $fileNameToStore);
    $image =  InterventionImage::make(public_path("storage/image/{$fileNameToStore}"))->resize(1000, 1000);
    
    $image->save();
    }else {
    $fileNameToStore = $item->image;
    }


    $item->update([
    'name' => $request->name,
    'body' => $request->body,
    'place' => $request->place,
    'score' => $request->score,
    'image' =>  $fileNameToStore,
    ]);

    //    dd($request);
    return redirect()->route('drinks.index')->with('info','編集完了!');
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
