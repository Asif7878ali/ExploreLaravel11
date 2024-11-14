<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $primaryKey = 'comment_id'; 
    protected $fillable =['user', 'comment', 'post'];
    // Define the relationship with User model
    public function users(){
          // The first parameter is the related model (User).
         //The second parameter is the foreign key in the current model(comments table) 
         // The third parameter is the primary key of the related model(users table)
         return $this->belongsTo(User::class, 'user','user_id');
    }

        // Define the relationship with Post model
        public function posts(){
        // The first parameter is the related model (Post).
         //The second parameter is the foreign key in the current model(comments table) 
         // The third parameter is the primary key of the related model(posts table)
            return $this->belongsTo(Post::class, 'post','post_id');
       }
       //Accesor
      protected function createdAt(): Attribute {
        return Attribute::make(
            get: function ($value) { 
                return Carbon::parse($value)->diffForHumans();
            }
        );
    }    
}
