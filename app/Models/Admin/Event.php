<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Event extends Model implements TranslatableContract
{
    use HasFactory ,Translatable, SoftDeletes;
    public $translatedAttributes = ['des', 'title'];
    protected $fillable = ['media_id'];
    public $translationForeignKey = 'event_id';
    public $translationModel = 'App\Models\Admin\EventTranslation';


    public function media(){
        return $this->belongsTo(MediaGroup::class , 'media_id');
    }


}
