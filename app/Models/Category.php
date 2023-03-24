<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Category extends Model
{
    use HasFactory;
    use Sortable ;
    protected $fillable = ['category_name'];

	public $sortable = ['id','category_name'];

    public function book()
    {
        return $this->hasMany(Books::class);
    }
}
