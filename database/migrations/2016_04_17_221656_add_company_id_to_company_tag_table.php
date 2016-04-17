<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCompanyIdToCompanyTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('company_tag', function (Blueprint $table) {
            $table->integer("company_id")->unsigned();
            $table->foreign("company_id")
                  ->references("id")->on("companies")
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
            $table->dropForeign("company_tag_company_id_foreign");
            $table->dropColumn("company_id");
        });
    }
}
