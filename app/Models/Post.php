<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $primaryKey = 'post_id';  
    protected $fillable =['post_image', 'title', 'description', 'viewable','person_who_create'];
     // Relationship: A Post belongs to a User
    public function users(){
          // first parameter is forign key of posts table
          // second parameter is primary key of users table
        return $this->belongsTo(User::class,'person_who_create','user_id');
    }

     // Relationship: A Post has many Comments
     public function comments(){
         // first parameter is forign key of comment table
         // second parameter is primary key of post table
        return $this->hasMany(Comment::class,'post','post_id');
     }
    //Accesor
    protected function title(): Attribute
    {
         return Attribute::make(
            get: function(string $value){
               return ucfirst($value);
            }
         );
    }

    protected function description(): Attribute
    {
         return Attribute::make(
            get: function(string $value){
               return ucfirst($value);
            }
         );
    }

    protected function createdAt(): Attribute
    {
        return Attribute::make(
            get: function ($value) { 
                return Carbon::parse($value)->diffForHumans();
            }
        );
    }    
}
