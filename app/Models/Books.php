<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Books extends Model
{
    use HasFactory;

    use Sortable ;
    protected $fillable = [ 'book_title', 'book_description', 'book_author', 'book_cover','book_pdf', 'category_id', 'archived' ];

	public $sortable = ['id','book_title', 'book_description', 'book_author', 'book_cover', 'category_id' , 'created_at', 'updated_at'];

    public function group()
    {
        return $this->hasOne(Group::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function likes()
    {
        return $this->belongsToMany(User::class , 'likes' , 'books_id' , 'user_id');
    }

    public function dislikes()
    {
        return $this->belongsToMany(User::class , 'dislikes' , 'books_id' , 'user_id');
    }

    public function favourites()
    {
        return $this->belongsToMany(User::class , 'favourites' , 'books_id' , 'user_id');
    }
    public function rating()
    {
        return $this->hasMany(ratings::class);
    }
    public function ratings()
    {
        return $this->belongsToMany(User::class , 'ratings' , 'books_id' , 'user_id');
    }
}
