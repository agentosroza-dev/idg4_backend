<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PdfBook extends Model
{
    /** @use HasFactory<\Database\Factories\PdfBookFactory> */
    use HasFactory;

    protected $fillable = [
        'title',
        'description',  // Changed from 'decription' to match migration
        'category_id',
        'status',
        'version',
        'image',
        'file'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}
