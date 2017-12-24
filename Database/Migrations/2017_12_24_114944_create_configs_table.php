<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConfigsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('configs', function (Blueprint $table) {

            $table->uuid('id')->unique();
            $table->primary('id');

            $table->string('key');
            $table->text('value')->nullable();

            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('configables', function (Blueprint $table) {

            $table->uuid('config_id')->index();
            $table->foreign('config_id')->references('id')->on('configs')->onDelete('cascade');

            $table->uuid('configable_id')->nullable();
            $table->string('configable_type')->nullable();
            $table->index(['configable_id', 'configable_type']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('configs');
        Schema::dropIfExists('configables');
    }
}
