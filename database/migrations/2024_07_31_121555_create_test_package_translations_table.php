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
        Schema::create('test_package_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('test_id');
            $table->string('locale')->index();
            $table->unique(['test_id', 'locale']);
            $table->string('title');
            $table->text('des');
            $table->text('small_des')->nullable();
            $table->foreign('test_id')->references('id')->on('test_packages')->onDelete('cascade');
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
        Schema::dropIfExists('test_package_translations');
    }
};
