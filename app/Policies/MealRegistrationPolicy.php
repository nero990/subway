<?php

namespace App\Policies;

use App\Meal;
use App\User;
use App\MealRegistration;
use Illuminate\Auth\Access\HandlesAuthorization;

class MealRegistrationPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the meal registration.
     *
     * @param User $user
     * @param MealRegistration $mealRegistration
     * @return mixed
     */
    public function view(User $user, MealRegistration $mealRegistration)
    {
        return $this->isOwner($user, $mealRegistration);
    }

    /**
     * Determine whether the user can create meal registrations.
     *
     * @param User $user
     * @return mixed
     */
    public function create(User $user)
    {
        if($meal = Meal::open()->first()) {
            $exists = !$meal->mealRegistrations()->whereUserId($user->id)->exists();
            request()->attributes->add(["meal" => $meal]);
            return $exists;
        }
        return false;
    }

    /**
     * Determine whether the user can update the meal registration.
     *
     * @param User $user
     * @param MealRegistration $mealRegistration
     * @return mixed
     */
    public function update(User $user, MealRegistration $mealRegistration)
    {
        return $mealRegistration->meal->is_open && $this->isOwner($user, $mealRegistration);
    }

    /**
     * Determine whether the user can delete the meal registration.
     *
     * @param User $user
     * @param MealRegistration $mealRegistration
     * @return mixed
     */
    public function delete(User $user, MealRegistration $mealRegistration)
    {
        return $this->isOwner($user, $mealRegistration);
    }

    /**
     * Determine whether the user can restore the meal registration.
     *
     * @param User $user
     * @param MealRegistration $mealRegistration
     * @return mixed
     */
    public function restore(User $user, MealRegistration $mealRegistration)
    {
        return $this->isOwner($user, $mealRegistration);
    }

    /**
     * Determine whether the user can permanently delete the meal registration.
     *
     * @param User $user
     * @param MealRegistration $mealRegistration
     * @return mixed
     */
    public function forceDelete(User $user, MealRegistration $mealRegistration)
    {
        return $this->isOwner($user, $mealRegistration);
    }

    /**
     * @param User $user
     * @param MealRegistration $mealRegistration
     * @return bool
     */
    private function isOwner(User $user, MealRegistration $mealRegistration): bool
    {
        return $user->id === $mealRegistration->user_id;
    }
}
