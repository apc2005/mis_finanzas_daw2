<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Income extends Model
{
protected $fillable = [
    'amount',
    'date',
    'category_id',
];



    public function category()
    {
        return $this->belongsTo(Category::class); 
    }
}
