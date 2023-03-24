<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Group extends Model
{
    use HasFactory;
    use Sortable ;
    protected $fillable = ['group_name', 'group_members', 'user_id', 'book_id'];
	public $sortable = ['id','group_name', 'group_members', 'user_id', 'book_id', 'created_at', 'updated_at'];

    public function book()
    {
        return $this->belongsTo(Books::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function users()
    {
        return $this->belongsToMany(User::class ,'members' , 'group_id' , 'user_id');
    }
    public function comments()
    {
        return $this->belongsToMany(Comments::class , 'group_comments' , 'group_id' , 'comments_id');
    }
}
