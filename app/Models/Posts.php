<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    use HasFactory;

    public $table = 'posts';

    public $fillable = [
      'user_id',
      'title',
      'text',
    ];
}
