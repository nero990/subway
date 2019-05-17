<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::redirect('/', '/login');

Route::middleware("auth")->group(function () {
    Route::resource("users", "UserController");
    Route::resource("sauces", "SauceController");
    Route::resource("breads", "BreadController");
    Route::resource("sandwiches", "SandwichController");
    Route::resource("vegetables", "VegetableController");
    Route::resource("meals", "MealController");

    Route::resource("meal-registrations", "MealRegistrationController");
});

Auth::routes();

Route::get("logout", "Auth\LoginController@logout");
Route::get('/home', 'HomeController@index')->name('home');
