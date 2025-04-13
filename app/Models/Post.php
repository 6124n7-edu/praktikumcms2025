<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Illuminate\Database\Eloquent\Model;

//class Post extends Model
class Post
{
    //Fungsi test database
    protected static function getDummyData()
    {
        return [
            ['id' => 1, 'title' => 'Belajar Laravel', 'content' => 'Laravel adalah framework PHP terbaik.'],
            ['id' => 2, 'title' => 'Pengenalan MVC', 'content' => 'MVC adalah framework PHP terbaik.'],
            ['id' => 3, 'title' => 'Routing di Laravel', 'content' => 'Routing adalah framework PHP terbaik.'],
        ];
    }

    //Ambil semua data
    public static function all()
    {
        return self::getDummyData();
    }

    //Cari data dengan id
    public static function find($id)
    {
        $posts = self::getDummyData();
        foreach($posts as $post) {
            if ($post['id'] == $id) {
                return $post;
            }
        }
        return null;
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
