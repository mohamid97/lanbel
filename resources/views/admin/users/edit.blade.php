@extends('admin.layout.master')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit user</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Users </li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">

            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Users</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" method="post" action="{{route('admin.users.update' , ['id'=> $user->id])}}" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="first_name">First Name</label>
                            <input type="text" name="first_name" class="form-control" id="first_name" placeholder="Enter First Name" value="{{ $user->first_name }}">
                            @error('first_name')
                            <div class="text-danger">{{ $errors->first('first_name') }}</div>
                            @enderror
                        </div>





                        <div class="form-group">
                            <label for=last_name">Last Name</label>
                            <input type="text" name="last_name" class="form-control" id="last_name" placeholder="Enter Last Name" value="{{ $user->last_name }}">
                            @error('last_name')
                            <div class="text-danger">{{ $errors->first('last_name') }}</div>
                            @enderror
                        </div>


                        <div class="form-group">Email</label>
                            <input type="text" name="email" class="form-control" id="email" placeholder="Enter Email" value="{{ $user->email }}">
                            @error('email')
                            <div class="text-danger">{{ $errors->first('email') }}</div>
                            @enderror
                        </div>



                        <div class="form-group">Phone</label>
                            <input type="text" name="phone" class="form-control" id="phone" placeholder="Enter Phone" value="{{ $user->phone }}">
                            @error('phone')
                            <div class="text-danger">{{ $errors->first('phone') }}</div>
                            @enderror
                        </div>








                        <div class="form-group">
                            <label for="image">Avatar</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input name="avatar" type="file" class="custom-file-input" id="image">
                                    <label class="custom-file-label" for="image">Choose Image</label>
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text" id="">Upload</span>
                                </div>
                            </div>

                            <img src="{{asset('uploads/images/users/'. $user->avatar)}}" width="150px" height="150px">

                            @error('image')
                            <div class="text-danger">{{ $errors->first('avatar') }}</div>
                            @enderror
                        </div>

                    </div>


                    <div class="card-footer">
                        <button type="submit" class="btn btn-info"> <i class="nav-icon fas fa-paper-plane"></i> Update</button>
                    </div>


                </form>
            </div>

        </div>
    </section>
@endsection
