<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreEventRequest;
use App\Models\Admin\Event;
use App\Models\Admin\Lang;
use App\Models\Admin\MediaGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class EventController extends Controller
{
    protected $langs;
    //

    public function __construct()
    {
        $this->langs = Lang::all();
    }
    //
    public function get()  {
        $events = Event::with('media')->withTrashed()->get();
        return view('admin.events.index' , ['events'=>$events , 'langs'=>$this->langs]);
    }




    public function create()
    {
        $media_groups = MediaGroup::all();
        return view('admin.events.add' , ['langs' => $this->langs , 'media_groups'=>$media_groups]);

    }

    public function store(StoreEventRequest $request)
    {
        
  
        try{
        
            $event = Event::create([
                'media_id' => $request->group_media,
            ]);
            
      
            foreach ($this->langs as $lang) {
                $event->{'title:'.$lang->code}  = $request->title[$lang->code];
                $event->{'des:'.$lang->code}  = $request->des[$lang->code];

            }
            $event->save();
            DB::commit();
            Alert::success('Success', 'Event  saved !');
            return redirect()->route('admin.events.index');

        }catch(\Exception $e){
            dd($e->getMessage() , $e->getLine());
            DB::rollBack();
            Alert::error('error', 'Tell The Programmer To solve Error');
            return redirect()->route('admin.events.index');
        }

    }

    public function edit($id){
        try{
            $media_groups = MediaGroup::all();
            return view('admin.events.update' , ['medias'=>$media_groups , 'event'=> Event::findOrFail($id) , 'langs'=> $this->langs]);

        }catch(\Exception $e){
            Alert::error('error', 'Tell The Programmer To solve Error');
            return redirect()->route('admin.events.index'); 
        }
    }

    public function update(StoreEventRequest $request , $id)
    {

        try{
            DB::beginTransaction();
            $event = Event::findOrFail($id);
            $event->media_id = $request->group_media;
            foreach ($this->langs as $lang) {
                $event->{'title:' . $lang->code} = $request->title[$lang->code];
                $event->{'des:' . $lang->code} = $request->des[$lang->code];

            }

            $event->save();
            DB::commit();
            Alert::success('Success', 'Your Member updated successfully!');
            return redirect()->route('admin.events.index');


        }catch(\Exception $e){
            DB::rollBack();
            dd($e->getMessage() , $e->getLine());
            Alert::error('error', 'Tell The Programmer To solve Error');
            return redirect()->route('admin.events.index'); 

        }

    }

    public function destroy($id)
    {
        $event = Event::findOrFail($id);
        $event->forceDelete();
        Alert::success('success', 'Event Deleted Successfully !');
        return redirect()->route('admin.events.index');
    }

    public function soft_delete($id)
    {
        $event = Event::findOrFail($id);
        $event->delete();
        Alert::success('success', 'Event Soft Deleted Successfully !');
        return redirect()->route('admin.events.index');
    }

    public function restore($id)
    {
        $event = Event::withTrashed()->findOrFail($id);
        $event->restore();
        Alert::success('success', 'Event Restored Successfully !');
        return redirect()->route('admin.events.index');

    }

}
