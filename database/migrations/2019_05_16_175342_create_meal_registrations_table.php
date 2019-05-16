<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMealRegistrationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meal_registrations', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->bigIncrements('id');
            $table->string("size",10);
            $table->unsignedBigInteger("user_id");
            $table->unsignedBigInteger("meal_id");
            $table->enum("baked", ["YES", "NO"]);
            $table->unsignedBigInteger("sandwich_id");
            $table->unsignedBigInteger("sauce_id");
            $table->string("extra", 255);
            $table->timestamps();

            $table->foreign("user_id")->references("id")->on("users");
            $table->foreign("meal_id")->references("id")->on("meals");
            $table->foreign("sandwich_id")->references("id")->on("sandwiches");
            $table->foreign("sauce_id")->references("id")->on("sauces");
        });

        Schema::create("meal_registration_vegetable", function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->unsignedBigInteger("meal_registration_id");
            $table->unsignedBigInteger("vegetable_id");

            $table->primary(["meal_registration_id", "vegetable_id"], "meal_reg_veg");
            $table->foreign("meal_registration_id")->references("id")->on("meal_registrations");
            $table->foreign("vegetable_id")->references("id")->on("vegetables");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('meal_registrations');
        Schema::dropIfExists('meal_registration_vegetable');
    }
}
