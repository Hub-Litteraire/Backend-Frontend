<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    use HasFactory;

    protected $fillable = ['comment_content', 'user_id'];

    public function group()
    {
        return $this->belongsToMany(Group::class , 'group_comments' , 'group_id' , 'comments_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
