<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vegetable extends Model
{
    protected $fillable = ["name"];

    public function mealRegistrations() {
        return $this->belongsToMany(MealRegistration::class);
    }
}
