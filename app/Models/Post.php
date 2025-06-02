<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table = 'posts';

    protected $fillable = ['title', 'content', 'user_id', 'category_id'];

    //Ambil semua data
    public static function getAll()
    {
        return Post::all();
    }

    //Cari data dengan id
    public static function find($id)
    {
        return Post::where('id', $id)->first();
    }

    

    //use HasFactory;

    //protected $fillable = ['title', 'content', 'user_id', 'category_id'];

    //public function user()
    //{
    //    return $this->belongsTo(User::class);
    //}

    //public function category()
    //{
    //    return $this->belongsTo(Category::class);
    //}

    //public function comments()
    //{
    //    return $this->hasMany(Comment::class);
    //}
}
