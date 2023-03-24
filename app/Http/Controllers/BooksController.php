<?php

namespace App\Http\Controllers;

use App\Models\Books;
use App\Models\books_ratings;
use App\Models\Category;
use App\Models\ratings;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Redirect::route('dashboard');
    }

    public function galery(Request $request) {

        if($request->has('Book_Title') && !empty($request->Book_Title)){
            $books= Books::where('book_title', 'LIKE', "%{$request->Book_Title}%")->with('favourites')->sortable()->paginate(4);
        }elseif($request->has('date') && !empty($request->date)){
            $books= Books::where('created_at', 'LIKE', "%{$request->date}%")->with('favourites')->sortable()->paginate(4);
        }elseif($request->has('category') && !empty($request->category)) {
                $books= Books::where('category_id', $request->category)->with('favourites')->sortable()->paginate(4);
        }else{
            $books = Books::with('favourites')->sortable()->paginate(4);
        }

        return view('galery',[
             'books' => $books,
             'pass' => 0,
             'pass1' => -1,
             'val' => 0,
             'rat' => 0,
             'categories' => Category::all()
            ]);
    }
    public function search()
    {
        return Redirect::route('dashboard');
    }

    public function ratingstore(Request $request){
        $this->validate($request, [
            "rating" => 'required',
            "book_id" => 'required',
        ]);
        $user = Auth::user()->id;
        $rating = ratings::create([
            "books_id" => $request->book_id,
            "star_rating" => $request->rating,
            "user_id" => $user,
        ]);
        $add = books_ratings::create([
            "books_id" => $request->book_id,
            "ratings_id" => $rating->id,
        ]);
        return redirect()->back();
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
        
        $cloud = cloudinary::getsignature();

        $this->validate($request, [
            "book_title" => 'required',
            "book_description" => 'required',
            "book_author" => 'required',
            "category_id" => 'required',
            "file" => ['file', 'mimes:docx,pdf,png,jpg'],
            "file2" => ['file', 'mimes:docx,pdf,png,jpg'],
        ]);
        $response = Http::attach('file', file_get_contents($request->file('file')), 'image'.'.'.$request->file->extension())->post('https://api.cloudinary.com/v1_1/dhti1bezp/auto/upload', [
            'api_key' => '882123237232126',
            'timestamp' => $cloud['timestamp'],
            'signature' => $cloud['signature'],
            'folder' => 'books',
        ]);

        $jsonData = $response->json();

        $cloud2 = cloudinary::getsignature();

        $response2 = Http::attach('file', file_get_contents($request->file('file2')), 'pdf'.'.'.$request->file2->extension())->post('https://api.cloudinary.com/v1_1/dhti1bezp/auto/upload', [
            'api_key' => '882123237232126',
            'timestamp' => $cloud2['timestamp'],
            'signature' => $cloud2['signature'],
            'folder' => 'books',
        ]);

        $jsonData2 = $response2->json();
        books::create([
            "book_title" => $request->book_title,
            "book_description" => $request->book_description,
            "book_author" => $request->book_author,
            "category_id" => $request->category_id,
            "book_pdf" => $jsonData2['url'],
            "book_cover" => $jsonData['url'],
            "archived" => 0,
        ]);

        return Redirect::route('dashboard');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category = Category::all();
        return view('books.edit', [
            'book' => Books::findOrFail($id),
            'categories' => $category
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('books.edit', [
            'book' => Books::findOrFail($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            "book_title" => 'required',
            "book_description" => 'required',
            "book_author" => 'required',
            "category_id" => 'required',
            "archived" => 'required',
        ]);
        books::where('id',$id)->update([
            "book_title" => $request->book_title,
            "book_description" => $request->book_description,
            "book_author" => $request->book_author,
            "category_id" => $request->category_id,
            "archived" => $request->archived,
        ]);

        return Redirect::route('dashboard');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        books::where('id',$id)->delete();

        return Redirect::to('/dashboard');
    }
}
