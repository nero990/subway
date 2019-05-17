<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bread extends Model
{
    protected $fillable = ["name"];

    public function mealRegistrations() {
        return $this->hasMany(MealRegistration::class);
    }
}
