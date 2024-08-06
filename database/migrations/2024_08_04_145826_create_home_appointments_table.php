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
        Schema::create('home_appointments', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('phone_number');
            $table->string('email');
            $table->string('address');
            $table->date('booking_date'); // تاريخ الحجز
            $table->enum('gender', ['male', 'female', 'other']);    
            $table->text('des')->nullable();
            $table->enum('status', ['Pending', 'Accepted', 'Finished', 'Declined'])->default('Pending');
            $table->string('test_type');

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
        Schema::dropIfExists('home_appointments');
    }
};
