<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable =['post_image', 'title', 'description', 'viewable','person_who_create'];
    // Define the relationship with User model
    public function user(){
          // first parameter is forign key of posts table
          // second parameter is primary key of users table
        return $this->belongsTo(User::class,'person_who_create','user_id');
    }
}
