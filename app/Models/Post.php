<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';
    protected $fillable = [
        'title',
        'description',
        'feature_image',
        'tags',
        'seo_title',
        'seo_description',
        'seo_tags',
        'excerpt',
        'category_id',
        'user_id',
        'comment_id',
        'date_of_post',
        'date_of_last_edit',
        'status',
    ];


    public function category()
    {
       return $this->belongsTo(Category::class,'category_id', 'id');
    }

    public function user()
    {
       return $this->belongsTo(User::class,'user_id', 'id');
    }
}
