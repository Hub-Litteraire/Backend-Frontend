<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class group_comments extends Model
{
    use HasFactory;
    protected $fillable = ['group_id', 'comments_id'];

}
