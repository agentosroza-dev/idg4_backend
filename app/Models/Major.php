<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Major extends Model
{
    /** @use HasFactory<\Database\Factories\MajorFactory> */
    use HasFactory;

    protected $fillable = ['title'];

    public function students(){
        //hasMany(model, foreign_key, id)
        return $this->hasMany(Student::class, 'major_id', 'id');
    }
}
