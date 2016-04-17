<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTagIdToCompanyTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('company_tag', function (Blueprint $table) {
            $table->integer("tag_id")->unsigned();
            $table->foreign("tag_id")
                  ->references("id")->on("tags")
                  ->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('company_tag', function (Blueprint $table) {
            $table->dropForeign("company_tag_tag_id_foreign");
            $table->dropColumn("tag_id");
        });
    }
}
