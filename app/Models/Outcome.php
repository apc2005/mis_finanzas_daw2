<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Outcome extends Model
{
    use HasFactory;

    protected $fillable = ['date', 'category_id', 'taxes'];

    /**
     * Get the category that owns the outcome.
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}

