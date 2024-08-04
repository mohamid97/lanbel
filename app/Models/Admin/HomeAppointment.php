<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeAppointment extends Model
{
    use HasFactory;
    protected $fillable = [
        'first_name',
        'last_name',
        'phone_number',
        'email',
        'address',
        'gender',
        'booking_date', // إضافة تاريخ الحجز
        'status',
        'des'
    ];
}
