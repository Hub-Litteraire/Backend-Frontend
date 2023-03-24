<?php

namespace App\Http\Controllers;

use App\Models\books_comments;
use App\Models\Comments;
use App\Models\group_comments;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class commentsController extends Controller
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
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            "comment_content" => 'required',
            "group_id" => 'required',
            "pg" => 'required',
        ]);
        $user = Auth::user()->id;
        $comment = Comments::create([
            "comment_content" => $request->comment_content,
            "user_id" => $user,
        ]);
        $add = group_comments::create([
            "group_id" => $request->group_id,
            "comments_id" => $comment->id,
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
        Comments::where('id',$id)->delete();

        return redirect()->back();
    }
}
