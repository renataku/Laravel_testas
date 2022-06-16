<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'active',
        'category_id',
        'file'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
