<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Income extends Model
{
    protected $fillable = ['date', 'category', 'amount'];


    public function category()
    {
        return $this->belongsTo(Category::class); 
    }
}
