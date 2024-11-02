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
