<?php

namespace App\Policies;

use App\Meal;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class MealPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can update the meal registration.
     *
     * @param User $user
     * @param Meal $meal
     * @return mixed
     */
    public function rate(User $user, Meal $meal)
    {
        return !$meal->ratings()->whereUserId($user->id)->exists();
    }
}
