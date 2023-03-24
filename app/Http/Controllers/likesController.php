<?php

namespace App\Http\Controllers;

use App\Models\books_user;
use App\Models\dislikes;
use App\Models\likes;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class likesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
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
        $dis = dislikes::where('books_id' , $request->book_id)->where('user_id' , $user)->get();
        if(isset($dis[0])){
            dislikes::where('books_id' , $request->book_id)->where('user_id' , $user)->delete();
        }
        $add = likes::create([
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
        likes::where([

            ['books_id', $id],
    
            ['user_id', $user]
    
        ])->delete();

        return redirect()->back();
    }
}
