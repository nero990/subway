<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sandwich extends Model
{
    protected $fillable = ["taste"];

    public function mealRegistrations() {
        return $this->hasMany(MealRegistration::class);
    }
}
