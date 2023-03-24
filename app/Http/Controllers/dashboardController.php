<?php

namespace App\Http\Controllers;

use App\Models\Books;
use App\Models\Category;
use App\Models\Group;
use App\Models\User;
use Illuminate\Http\Request;

class dashboardController extends Controller
{
    public function index()
    {
        $books = Books::sortable()->paginate(5);
        $Categories = Category::sortable()->paginate(5);
        $Groups = Group::sortable()->paginate(5);
        $users = User::all();
        $cloud = cloudinary::getsignature();
                
        return view('dashboard',[
            'books' => $books,
            'Categories' => $Categories,
            'Groups' => $Groups,
            'users' => $users,
            'cloud' => $cloud,
        ]);
    }
}
