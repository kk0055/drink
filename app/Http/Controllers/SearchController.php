<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Drink;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('query');

        if(!$query) {
            return redirect()->route('drinks.index');
        }
       $drinks = Drink::where('name', 'LIKE',"%{$query}%")
       ->orWhere('body', 'LIKE',"%{$query}%")
       ->simplePaginate(8);
    
    //    dd($items);
       return view('drinks.search_results',[
           'drinks' => $drinks
       ]);
    }
}
