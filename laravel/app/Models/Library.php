<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Library extends Pivot
{
    use HasFactory;

    protected $fillable = ['book_id', 'author_id'];

    protected $hidden = ['created_at', 'updated_at'];
}
