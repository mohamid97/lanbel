<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class TestPackage extends Model implements   TranslatableContract
{
    use HasFactory , Translatable , SoftDeletes;

    protected $fillable = ['image'];
    public $translatedAttributes = ['des', 'small_des' , 'title'];
    public $translationForeignKey = 'test_id';
    public $translationModel = 'App\Models\Admin\TestPackageTranslation';
}
