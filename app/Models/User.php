<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    
    protected $primaryKey = 'user_id';  

     // Define the relationship with Post model
     public function posts(){
        // first parameter is forign key of posts table
        // second parameter is primary key of users table
        return $this->hasMany(Post::class,'person_who_create','user_id');
     }

      // Define the relationship with Comment model
      public function comments(){
         // first parameter is forign key of comment table
        // second parameter is primary key of users table
        return $this->hasMany(Comment::class,'user','user_id');
      }

    protected $fillable = [
        'name',
        'email',
        'address',
        'number',
        'gender',
        'admin',
        'password',
    ];
       
    //Accessor
    protected function name(): Attribute
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
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
        ];
    }
}
