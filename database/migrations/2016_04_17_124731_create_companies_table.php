<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->increments('id');

            $table->string("name");
            $table->string("slug")->unique();
            $table->string("image")->nullable();
            $table->longText("content")->nullable();
            $table->bigInteger("views")->default(0);
            $table->string("phone")->nullable();
            $table->string("fax")->nullable();
            $table->string("email")->nullable();
            $table->string("website")->nullable();
            $table->string("facebook")->nullable();
            $table->string("twitter")->nullable();
            $table->string("google")->nullable();
            $table->double("latitude")->nullable();
            $table->double("longitude")->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('companies');
    }
}
