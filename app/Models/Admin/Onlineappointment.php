<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Onlineappointment extends Model
{
    use HasFactory;
    protected $fillable = [
        'first_name',
        'last_name',
        'phone_number',
        'email',
        'address',
        'nationality',
        'birth_date',
        'gender',
        'booking_date', // إضافة تاريخ الحجز
        'booking_time',
        'status',
        'test_type'
    ];
}
