<?php

namespace App\Http\Controllers;

use App\Models\dislikes;
use App\Models\likes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class dislikesController extends Controller
{
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(){
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            "book_id" => 'required',
            "pg" => 'required',
        ]);
        $user = Auth::user()->id;
        $like = likes::where('books_id' , $request->book_id)->where('user_id' , $user)->get();
        if(isset($like[0])){
            likes::where('books_id' , $request->book_id)->where('user_id' , $user)->delete();
        }
        $add = dislikes::create([
            "books_id" => $request->book_id,
            "user_id" => $user,
        ]);
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = Auth::user()->id;
        dislikes::where([

            ['books_id', $id],
    
            ['user_id', $user]
    
        ])->delete();

        return redirect()->back();
    }
}
