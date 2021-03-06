<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Drink;
use App\Models\User;
use Intervention\Image\ImageManagerStatic as InterventionImage;

class DrinkController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth'])->only(['store', 'destroy']);
    }

    public function index( )
    {
       
        $drinks = Drink::orderBy('created_at','desc')->simplePaginate(8);
     
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
    'body' => 'required|max:150',
    'score' => 'required',
    'place' => 'required',
    'image' => 'required'
    ],
    [
        'name.required' => '何飲んだの？',
        'body.required'  => '感想教えてね',
        'body.max'  => '150文字までだよ',
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

        $drink = Drink::findOrFail($drink);
        return view('drinks.show',[
            'drink' => $drink
        ]);
    }

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

    public function edit($drink)
    {
         //一つのItemを返す
        $item = Drink::findOrFail($drink);

        return view('drinks.edit',[
            'item' =>$item
        ]);

   }

   public function update(Request $request, $drink)
{

$this->validate($request, [
'title' => 'required',
'body' => 'required'
],
[
    'title.required' => 'タイトルは必須項目です。',
    'body.required'  => '詳細は必須項目です。',
    
]);
$item = Drink::findOrFail($drink);

if($request->hasFile('image')){
$filenameWithExt = $request->file('image')->getClientOriginalName();
$filename = pathinfo($filenameWithExt ,PATHINFO_FILENAME);
$extension = $request->file('image')->getClientOriginalExtension();
$fileNameToStore = $filename . '_'. time(). '.'.$extension;
$path = $request->file('image')->storeAs('public/image',  $fileNameToStore);
}else {
$fileNameToStore = $item->image;
}


$item->update([
'title' => $request->title,
'body' => $request->body,
'image' =>  $fileNameToStore,
]);

//    dd($request);
return redirect()->route('item.show',['itemId'=> $item->id])->with('info','編集が完了しました。');
}

}
