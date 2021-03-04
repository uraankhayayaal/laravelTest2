<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = ['title'];

    protected $hidden = ['created_at', 'updated_at'];

    public function authors()
    {
        return $this->belongsToMany(Author::class, 'libraries');
    }
}
