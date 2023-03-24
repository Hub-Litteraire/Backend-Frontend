<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user_books extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'books_id'];

}
