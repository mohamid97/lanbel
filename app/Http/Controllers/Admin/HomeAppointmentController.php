<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\HomeAppointment;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class HomeAppointmentController extends Controller
{
    public function get(Request $request){
        $query = HomeAppointment::query();

        // تصفية باستخدام الاسم الأول أو الاسم الأخير
        if ($request->has('name') && !empty($request->name)) {
            $name = $request->input('name');
            $query->where('first_name', 'like', "%{$name}%")
                  ->orWhere('last_name', 'like', "%{$name}%")
                  ->orWhere('test_type', 'like', "%{$name}%");
        }

        // تصفية باستخدام الحالة
        if ($request->has('status') && in_array($request->input('status'), ['Pending', 'Accepted', 'Finished', 'Declined'])) {
            $status = $request->input('status');
            $query->where('status', $status);
        }

        // جلب المواعيد بترتيب تنازلي
        $appointments = $query->orderBy('created_at', 'desc')->paginate(10);

        return view('admin.appointments.home', ['appointments' => $appointments]);
    } // end get or index page



        // دالة لعرض نموذج التعديل
        public function edit($id)
        {
            $appointment = HomeAppointment::findOrFail($id);
            return view('admin.appointments.edit_home', compact('appointment'));
        }
    
        // دالة لتحديث الحالة
        public function update(Request $request, $id)
        {
            $appointment = HomeAppointment::findOrFail($id);
            $appointment->status = $request->input('status');
            $appointment->save();
            Alert::success('Success', 'Updated Successfully ! !');

            return redirect()->route('admin.appointments.home');
        }
    
        // دالة لحذف الموعد
        public function destroy($id)
        {
            $appointment = HomeAppointment::findOrFail($id);
            $appointment->delete();
            Alert::success('Success', 'Deleted Successfully ! !');

            return redirect()->route('admin.appointments.home');
        }
}
