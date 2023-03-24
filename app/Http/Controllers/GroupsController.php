<?php

namespace App\Http\Controllers;

use App\Models\Books;
use App\Models\Group;
use App\Models\members;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class GroupsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Books::all();
        $users = User::all();
        $gr = Group::with('users')->get();
        return view('groups.view', [
            'groups' => Group::find(1),
            'books' => $books,
            'pass' => 0,
            'all' => $gr,
            'users' => $users,
            'pass1' => -1,
            'pass2' => -1,
        ]);
    }

    public function getSingle(string $id){
        $pass = 0;
        $books = Books::all();
        $users = User::all();
        $gr = Group::with('users')->get();
        return view('groups.view', [
            'groups' => Group::findOrFail($id),
            'books' => $books,
            'pass' => $pass,
            'all' => $gr,
            'users' => $users,
            'pass1' => -1,
            'pass2' => -1
        ]);
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
            "group_name" => 'required',
            "book_id" => 'required',
        ]);
        $arr = [];
        for($i=0;$i<6;$i++){
            $member = 'member'.$i;
            if(isset($request->$member)){
                array_push($arr , $request->$member);
            }
        }
        function no_dupes(array $input_array) {
            return count($input_array) === count(array_flip($input_array));
        }
        $ar=no_dupes($arr);
        if($ar){
        $user = Auth::user()->id;
        $group = Group::create([
            "book_id" => $request->book_id,
            "group_name" => $request->group_name,
            "user_id" => $user,
        ]);
        $member = '';
        for($i=0;$i<6;$i++){
            $member = 'member'.$i;
            if(isset($request->$member)){
                members::create([
                    "group_id" => $group->id,
                    "user_id" => $request->$member,
                ]);
            }
        }
        return Redirect::route('groups.index');
    }else{
        return Redirect::route('groups.index')->withErrors('duplicated');
    }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $books = Books::all();
        $users = User::all();
        return view('groups.edit', [
            'group' => Group::findOrFail($id),
            'books' => $books,
            'users' => $users,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('groups.edit', [
            'group' => Group::findOrFail($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            "group_name" => 'required',
            "created_by" => 'required',
            "book_id" => 'required',
        ]);
        Group::where('id',$id)->update([
            "group_name" => $request->group_name,
            "user_id" => $request->created_by,
            "book_id" => $request->book_id,
        ]);

        return Redirect::route('dashboard');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Group::where('id',$id)->delete();

        return Redirect::to('/home');
    }
}
