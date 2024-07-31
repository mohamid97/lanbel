<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\UserDetailsResource;
use App\Http\Resources\Admin\UsersResource;
use App\Models\User;
use App\Trait\ResponseTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    use ResponseTrait;
    public function get()
    {
        $users = User::all();
        return  $this->res(true ,'All Users' , 200 ,UsersResource::collection($users));
    }

    public function store(Request $request){
        try{
                $request->validate([
                    'first_name'=>'required|string|max:255',
                    'last_name'=>'required|string|max:255',
                    'avatar'=>'nullable|image',
                    'password'=>'required|string|min:6',
                    'email'=>'required|email|unique:users,email',
                ]);


                if($request->has('avatar')){
                    $image_name = $request->avatar->getClientOriginalName();
                    $request->avatar->move(public_path('uploads/images/users'), $image_name);    
                }

                DB::beginTransaction();
                    $user = new User();
                    $user->first_name = $request->first_name;
                    $user->last_name  = $request->last_name;
                    $user->password   = Hash::make($request->password);
                    $user->email      = $request->email;
                    (isset($image_name) && $image_name != null) ? $user->avatar = $image_name : $user->avatar = null;
                    $user->save();              
                DB::commit();
                return  $this->res(true ,'All Users' , 200 ,new UserDetailsResource($user));

        }catch(\Exception $e){
            
                DB::rollBack();
                return  $this->res(false ,'Error Happend' , $e->getCode() , $e->getMessage());





        }

    }
}
