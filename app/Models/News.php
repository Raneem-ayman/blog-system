<?php

namespace App\Models;

use App\Jobs\PublishNews;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class News extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'title',
        'description',
        'image',
        'news_category_id',
        'publish_at',
        'published_at'
    ];
    protected $casts = [
        'publish_at' => 'datetime',
        'published_at' => 'datetime',
        'news_category_id' =>'integer'
    ];

    protected static function booted()
    {
        static::saved(function ($news) {
            if ($news->publish_at && $news->publish_at > now()) {
                PublishNews::dispatch($news)->delay($news->publish_at);
            }
        });
    }
    public function category()
    {
        return $this->belongsTo(NewsCategory::class, 'news_category_id', 'id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

}
