<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Admin\Onlineappointment;
use App\Trait\ResponseTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
class OnlineAppointmentController extends Controller
{
    use ResponseTrait;
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'address' => 'required|string|max:255',
            'nationality' => 'required|string|max:255',
            'birth_date' => 'required|date',
            'gender' => 'required|in:male,female,other',
            'booking_time' => 'required|date_format:H:i',
            'test_type' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $currentDate = Carbon::today()->toDateString();
        $bookingTime = $request->input('booking_time');

        // إضافة تاريخ الحجز
        $bookingDate = Carbon::today()->toDateString();

        if (!$this->isValidBookingTime($bookingTime)) {
            return response()->json(['error' => 'Invalid booking time. Please select a time that follows the 10-minute interval.'], 400);
        }

        $existingBooking = Onlineappointment::where('booking_date', $bookingDate)
                                       ->where('phone_number', $request->input('phone_number'))
                                       ->first();

        if ($existingBooking) {
            return response()->json(['error' => 'You have already booked an appointment for today.'], 400);
        }

        $existingSlot = Onlineappointment::where('booking_time', $bookingTime)
                                   ->where('booking_date', $bookingDate)
                                   ->first();

        if ($existingSlot) {
            return response()->json(['error' => 'This time slot is already booked.'], 400);
        }

        $appointment = Onlineappointment::create([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'phone_number' => $request->input('phone_number'),
            'email' => $request->input('email'),
            'address' => $request->input('address'),
            'nationality' => $request->input('nationality'),
            'birth_date' => $request->input('birth_date'),
            'gender' => $request->input('gender'),
            'booking_date' => $bookingDate, // تعيين تاريخ الحجز
            'booking_time' => $bookingTime,
            'status' => 'Pending',
            'test_type' => $request->input('test_type'),
        ]);

        return $this->res(true , 'Appointment booked successfully' , 200 , $appointment);

    }

    public function availableSlots()
    {
        $startTime = Carbon::createFromTime(9, 0);
        $endTime = Carbon::createFromTime(18, 0);
        $interval = 10; // 10 دقائق

        $slots = [];
        $currentDate = Carbon::today()->toDateString();

        for ($time = $startTime; $time < $endTime; $time->addMinutes($interval)) {
            $formattedTime = $time->format('H:i');
            $isBooked = Onlineappointment::where('booking_time', $formattedTime)
                                   ->where('booking_date', $currentDate)
                                   ->exists();
            if (!$isBooked) {
                $slots[] = $formattedTime;
            }
        }

        return $this->res(true,'All intervals Available' , 200 , $slots);

       // return response()->json(['available_slots' => $slots]);
    }

    private function isValidBookingTime($time)
    {
        $pattern = '/^([01]?[0-9]|2[0-3]):[0-5][0-9]$/';
        if (!preg_match($pattern, $time)) {
            return false;
        }

        list($hours, $minutes) = explode(':', $time);
        return $minutes % 10 === 0;
    }}
