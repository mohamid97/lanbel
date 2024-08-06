<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Onlineappointment;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class OnlineAppointmentController extends Controller
{
    public function get(Request $request){
        $query = Onlineappointment::query();

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

        return view('admin.appointments.online', ['appointments' => $appointments]);
    } // end get or index page



        // دالة لعرض نموذج التعديل
        public function edit($id)
        {
            $appointment = Onlineappointment::findOrFail($id);
            return view('admin.appointments.edit_online', compact('appointment'));
        }
    
        // دالة لتحديث الحالة
        public function update(Request $request, $id)
        {
            $appointment = Onlineappointment::findOrFail($id);
            $appointment->status = $request->input('status');
            $appointment->save();
            Alert::success('Success', 'Updated Successfully ! !');

            return redirect()->route('admin.appointments.online');
        }
    
        // دالة لحذف الموعد
        public function destroy($id)
        {
            $appointment = Onlineappointment::findOrFail($id);
            $appointment->delete();
            Alert::success('Success', 'Deleted Successfully ! !');

            return redirect()->route('admin.appointments.online');
        }



}
