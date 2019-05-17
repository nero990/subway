<?php

use App\User;
use Illuminate\Database\Seeder;

class FactorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class,20)->create();
        factory(App\Bread::class,10)->create();
        factory(App\Meal::class,20)->create();
        factory(App\Sandwich::class,5)->create();
        factory(App\Sauce::class,7)->create();
        factory(App\Vegetable::class,7)->create();
    }
}
