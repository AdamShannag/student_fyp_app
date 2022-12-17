<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::table('projects', function (Blueprint $table) {
        $table->date('start_date')->nullable()->change();
        $table->date('end_date')->nullable()->change();
        $table->decimal('duration')->nullable()->change();
    });
}



    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
{
    Schema::table('projects', function (Blueprint $table) {
        $table->date('start_date')->nullable(false)->change();
        $table->date('end_date')->nullable(false)->change();
        $table->decimal('duration')->nullable(false)->change();
    });
}
};
