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
        Schema::create('housing_scheme_plots', function (Blueprint $table) {
            $table->id();
            $table->string("city", 25);
            $table->string("society", 25);
            $table->string("block", 1);
            $table->smallInteger("marla");
            $table->smallInteger("plot_size");
            $table->integer("price");
            $table->string("status", 25);
            $table->boolean("migration_done")->default(false);
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
        Schema::dropIfExists('housing_scheme_plots');
    }
};
