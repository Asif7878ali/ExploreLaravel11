<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $primaryKey = 'comment_id'; 
    protected $fillable =['user', 'comment', 'post'];
    // Define the relationship with User model
    public function user(){
         // first parameter is forign key of comments table
         // second parameter is primary key of users table
         return $this->belongsTo(User::class, 'user','user_id');
    }

        // Define the relationship with Post model
        public function post(){
            // first parameter is forign key of comments table
            // second parameter is primary key of post table
            return $this->belongsTo(Post::class, 'post','post_id');
       }
}
