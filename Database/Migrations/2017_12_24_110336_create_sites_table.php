<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sites', function (Blueprint $table) {

            $table->uuid('id')->unique();
            $table->primary('id');

            $table->string('name')->unique();


            $table->string('url')->unique();
            $table->string('ui')->unique();

            $table->boolean('status')->default(true);
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('siteables', function (Blueprint $table) {

            $table->uuid('site_id')->index();
            $table->foreign('site_id')->references('id')->on('sites')->onDelete('cascade');

            $table->uuid('siteable_id')->nullable();
            $table->string('siteable_type')->nullable();
            $table->index(['siteable_id', 'siteable_type']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sites');
        Schema::dropIfExists('siteables');
    }
}
