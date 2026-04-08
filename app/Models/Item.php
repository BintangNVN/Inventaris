<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Item extends Model
{
    protected $fillable = [
        'name',
        'category_id',
        'total',
        'repair',
        'lending',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}


