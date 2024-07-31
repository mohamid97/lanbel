<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestPackageTranslation extends Model
{
    use HasFactory;
    protected $fillable = ['des', 'small_des' , 'title'];

}
