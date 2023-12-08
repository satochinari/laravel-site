<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'contents',
    ];

  public function user()
  {
    return $this->belongsTo(User::class); //userと関連付けを行う
  }
}