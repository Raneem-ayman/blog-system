<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = ['content', 'news_id'];

    public function news()
    {
        return $this->belongsTo(News::class);
    }

}
