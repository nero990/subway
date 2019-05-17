<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MealRegistration extends Model
{
    protected $fillable = ["meal_id", "bread_id", "bread_size", "baked", "sandwich_id", "sauce_id", "extra"
    ];

    public function bread() {
        return $this->belongsTo(Bread::class);
    }

    public function meal() {
        return $this->belongsTo(Meal::class);
    }

    public function sandwich() {
        return $this->belongsTo(Sandwich::class);
    }

    public function sauce() {
        return $this->belongsTo(Sauce::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function vegetables() {
        return $this->belongsToMany(Vegetable::class);
    }


}
