<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\TestPackageResource;
use App\Models\Admin\TestPackage;
use App\Trait\ResponseTrait;
use Illuminate\Http\Request;

class TestPackageController extends Controller
{
    use ResponseTrait;
    //
    public function get(){
        $tests = TestPackage::all();
        return  $this->res(true ,'all Test Package' , 200 ,TestPackageResource::collection($tests));
    }
}
