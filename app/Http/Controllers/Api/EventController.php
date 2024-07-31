<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\EventsResource;
use App\Models\Admin\Event;
use App\Trait\ResponseTrait;
use Illuminate\Http\Request;

class EventController extends Controller
{
    use ResponseTrait;
    //
    public function get(){
        $events = Event::all();
        return  $this->res(true ,'All Events' , 200 ,EventsResource::collection($events));
    }
}
