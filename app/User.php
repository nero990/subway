<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', "is_admin"
    ];

    private static $defaultPassword = "password";

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getRoleAttribute() {
        return $this->is_admin ? "Administrator" : "Staff";
    }

    public function mealRegistrations() {
        return $this->hasMany(MealRegistration::class);
    }

    /**
     * @return string
     */
    public static function getDefaultPassword(): string
    {
        return self::$defaultPassword;
    }
}
