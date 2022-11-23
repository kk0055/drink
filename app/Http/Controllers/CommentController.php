<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    public function index()
    {
        return Comment::latest()->get();
    }

    public function store(Request $request)
    {
        // $request->validate([
        //     'body'=>'required',
        // ]);
   
        // $input = $request->all();
        // $input['user_id'] = auth()->user()->id;
    
        return Comment::create($request->all());

    }
}
