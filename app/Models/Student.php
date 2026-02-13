<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    /** @use HasFactory<\Database\Factories\StudentFactory> */
    use HasFactory;

    protected $fillable = ['name', 'major_id','image'];

    public function major(){
        //belongsTo(model, foreign_key, id)
        return $this->belongsTo(Major::class, 'major_id', 'id');
    }
}
