<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Admin\HomeAppointment;
use App\Trait\ResponseTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class HomeAppointmentController extends Controller
{

    use ResponseTrait;
    //
    public function store(Request $request){

        try{
            DB::beginTransaction();
            $validator = Validator::make($request->all(), [
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'phone_number' => 'required|string|max:20',
                'email' => 'required|email|max:255',
                'address' => 'required|string|max:255',
                'gender' => 'required|in:male,female,other',
                'booking_date' => 'required|date',
                'des' => 'nullable|string|max:5000',
            ]);
            
            $appointment = HomeAppointment::create([
                'first_name' => $request->input('first_name'),
                'last_name' => $request->input('last_name'),
                'phone_number' => $request->input('phone_number'),
                'email' => $request->input('email'),
                'address' => $request->input('address'),
                'birth_date' => $request->input('birth_date'),
                'gender' => $request->input('gender'),
                'booking_date' => $request->input('booking_date'), // تعيين تاريخ الحجز
                'status' => 'Pending',
                'test_type' => $request->input('test_type'),
            ]);

            DB::commit();
            return $this->res(true , 'Home Booking For Visit Added Successfully !'  , 200  , $appointment);

        }catch(\Exception $e){
            DB::rollBack();
            return $this->res(false , $e->getMessage()  , $e->getCode());

        }


    } // end store home appointment





}
