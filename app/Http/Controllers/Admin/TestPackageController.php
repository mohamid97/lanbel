<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreTestPackageRequest;
use App\Http\Requests\Admin\UpdateTestPackageRequest;
use App\Models\Admin\Lang;
use App\Models\Admin\TestPackage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class TestPackageController extends Controller
{


    protected $langs;
    //

    public function __construct()
    {
        $this->langs = Lang::all();
    }
    //
    public function get()  {
        $tests = TestPackage::withTrashed()->get();
        return view('admin.test_package.index' , ['tests'=>$tests , 'langs'=>$this->langs]);
    }




    public function create()
    {
        return view('admin.test_package.add' , ['langs' => $this->langs]);

    }

    public function store(StoreTestPackageRequest $request)
    {
        
  
        try{

            $image_name ='';
            if($request->has('image')){        
                $image_name = time() . $request->image->getClientOriginalName();
                $request->image->move(public_path('uploads/images/tests'), $image_name);
            }

        
            $test = TestPackage::create([
                'image' => $image_name
            ]);
            
      
            foreach ($this->langs as $lang) {
                $test->{'title:'.$lang->code}  = $request->title[$lang->code];
                $test->{'small_des:'.$lang->code}  = $request->small_des[$lang->code];
                $test->{'des:'.$lang->code}  = $request->des[$lang->code];

            }
            $test->save();
            DB::commit();
            Alert::success('Success', 'Your Test Package saved !');
            return redirect()->route('admin.tests.index');

        }catch(\Exception $e){
            dd($e->getMessage() , $e->getLine());
            DB::rollBack();
            Alert::error('error', 'Tell The Programmer To solve Error');
            return redirect()->route('admin.tests.index');
        }

    }

    public function edit($id){
        try{
            return view('admin.test_package.edit' , ['test'=> TestPackage::findOrFail($id) , 'langs'=> $this->langs]);
        }catch(\Exception $e){
            dd($e->getMessage() , $e->getLine());
            Alert::error('error', 'Tell The Programmer To solve Error');
            return redirect()->route('admin.tests.index'); 
        }
    }

    public function update(UpdateTestPackageRequest $request , $id)
    {

        try{
            DB::beginTransaction();
            $test = TestPackage::findOrFail($id);
            if ($request->has('image')) {
                $image_name = time() . $request->image->getClientOriginalName();
                $request->image->move(public_path('uploads/images/tests'), $image_name);
                if ($test->image && file_exists(public_path('uploads/images/tests/' . $test->image))) {
                    unlink(public_path('uploads/images/tests/' . $test->image));
                }
                $test->image = $image_name;
            }

            foreach ($this->langs as $lang) {
                $test->{'title:' . $lang->code} = $request->title[$lang->code];
                $test->{'small_des:' . $lang->code} = $request->small_des[$lang->code];
                $test->{'des:' . $lang->code} = $request->des[$lang->code];

            }

            $test->save();
            DB::commit();
            Alert::success('Success', 'Your Test Package updated successfully!');
            return redirect()->route('admin.tests.index');


        }catch(\Exception $e){
            DB::rollBack();
            return redirect()->route('admin.tests.index');
            dd($e->getMessage() , $e->getLine());

        }

    }

    public function destroy($id)
    {
        $test = TestPackage::findOrFail($id);
        $test->forceDelete();
        Alert::success('success', 'Test Package Deleted Successfully !');
        return redirect()->route('admin.tests.index');
    }

    public function soft_delete($id)
    {
        $test = TestPackage::findOrFail($id);
        $test->delete();
        Alert::success('success', 'Test Package Soft Deleted Successfully !');
        return redirect()->route('admin.tests.index');
    }

    public function restore($id)
    {
        $test = TestPackage::withTrashed()->findOrFail($id);
        $test->restore();
        Alert::success('success', 'Test Package Restored Successfully !');
        return redirect()->route('admin.tests.index');

    }
}
