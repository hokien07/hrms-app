<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    const STATUS = ['active' => 'active', 'suspended' => 'suspended'];
    const GENDER = ['male' => 'male', 'female' => 'female', 'hide' => 'gender_hide'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'email', 'password', 'firstname', 'lastname', 'avatar', 'tel', 'bio', 'birthday', 'gender', 'role_id'
    ];

    protected $attributes = [
        'status' => self::STATUS['active']
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'email_verified_at', 'password', 'remember_token', 'role', 'deleted_at'
    ];
    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime'
    ];

}
