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
        Schema::create('onlineappointments', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('phone_number');
            $table->string('email');
            $table->string('address');
            $table->string('nationality');
            $table->date('birth_date');
            $table->enum('gender', ['male', 'female', 'other']);
            $table->date('booking_date'); // تاريخ الحجز
            $table->time('booking_time'); // وقت الحجز
            $table->enum('status', ['Pending', 'Accepted', 'Finished', 'Declined'])->default('Pending');
            $table->string('test_type');
                        // إضافة التفرد لعمود التاريخ وعمود الوقت
                        $table->unique(['booking_date', 'booking_time']);
                        
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
        Schema::dropIfExists('onlineappointments');
    }
};
