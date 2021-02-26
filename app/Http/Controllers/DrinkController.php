<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Drink;
use App\Models\User;

class DrinkController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth'])->only(['store', 'destroy']);
    }

    public function index( )
    {
       
        $drinks = Drink::orderBy('created_at','desc')->get();
     
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
    'image' => 'required'
    ],
    [
        'name.required' => '何かにゅうりょくしてね',
        'body.required'  => '感想教えてね',
        'body.max'  => '150文字までだよ',
        'score.required' =>'何点？？？',
        'image.required' => '画像のせてくれ'
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
    'image' =>  $fileNameToStore,

    ]);
   

    //    dd($request);
    return redirect()->route('drinks.index')->with('info','ごちそうさまでした！');
    }

    public function show($drink)
    {

        $drink = Drink::findOrFail($drink);
        return view('drinks.show',[
            'drink' => $drink
        ]);
    }

    public function ranking()
    {

    $drinks = Drink::orderBy('score','desc')->get();
    
    return view('drinks.ranking', [
        'drinks' => $drinks,
        
    ]);
    }

}
