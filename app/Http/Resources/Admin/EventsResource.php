<?php

namespace App\Http\Resources\Admin;

use App\Models\Admin\MediaGroup;
use Illuminate\Http\Resources\Json\JsonResource;

class EventsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
       return[
        'title'=>$this->title,
        'des'=>$this->des,
        'media'=>new MediaGroupResource(MediaGroup::with(['gallerys' ,'files' , 'viedos' ])->find($this->media_id)),
       ];
       
    }
}
