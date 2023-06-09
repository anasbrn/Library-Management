<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'author',
        'isbn',
        'date_pub',
        'num_pages',
        'collection',
        'location',
        'status',
        'user_id',
        'gender_id',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function gender() {
        return $this->belongsTo(Gender::class);
    }
}
