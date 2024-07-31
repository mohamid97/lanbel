@extends('admin.layout.master')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Update Group Media</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Goup Media </li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">

            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Group Media</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" method="post" action="{{route('admin.group_media.update' , ['id'=> $media->id])}}" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="card-body">


                                <div class="form-group">
                                    <label for="des">Name </label>
                                    <input type="text" name="name" class="form-control" id="des" placeholder="Enter Description" value="{{ $media->name }}">
                                    @error('name')
                                    <div class="text-danger">{{ $errors->first('name') }}</div>
                                    @enderror
                                </div>

                                <div class="border p-3">
                                    @foreach($langs as $lang)
                                        <div class="form-group">
                                            <label for="title">Title ({{ $lang->name }}) </label>
                                            <input type="text" name="title[{{$lang->code}}]" class="form-control" id="title" placeholder="Enter Title" value="{{ $media->translate($lang->code)->title }}">
                                            @error('title.' . $lang->code)
                                            <div class="text-danger">{{ $errors->first('title.' . $lang->code) }}</div>
                                            @enderror
                                        </div>
                                    @endforeach
                                </div>
                                <br>


                                <div class="border p-3">
                                    @foreach($langs as $lang)
                                        <div class="form-group">
                                            <label for="small_des">Small Description ({{ $lang->name }}) </label>
                                            <textarea  type="text" name="small_des[{{$lang->code}}]" class="form-control" id="small_des" placeholder="Enter Small Description">
                                              {{ $media->translate($lang->code)->small_des }}
                                            </textarea>
                                            @error('small_des.' . $lang->code)
                                            <div class="text-danger">{{ $errors->first('small_des.' . $lang->code) }}</div>
                                            @enderror
                                        </div>
                                    @endforeach
                                </div>
                                <br>



                                <div class="border p-3">
                                    @foreach($langs as $lang)
                                        <div class="form-group">
                                            <label for="des"> Description ({{ $lang->name }}) </label>
                                            <textarea class="ckeditor"  type="text" name="des[{{$lang->code}}]" class="form-control" id="des" placeholder="Enter Description">
                                              {!! $media->translate($lang->code)->des !!}
                                            </textarea>
                                            @error('des.' . $lang->code)
                                            <div class="text-danger">{{ $errors->first('des.' . $lang->code) }}</div>
                                            @enderror
                                        </div>
                                    @endforeach
                                </div>


                                <br>
                                <div class="form-group">
                                    <label for="image">Image</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input name="image" type="file" class="custom-file-input" id="image">
                                            <label class="custom-file-label" for="image">Choose Image</label>
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text" id="">Upload</span>
                                        </div>
                                    </div>
        
                                    @if($media->image && $media->image != null)
                                    <img src="{{asset('uploads/images/media_group/'. $media->image)}}" width="150px" height="150px">
        
                                @endif
        
                                    @error('image')
                                    <div class="text-danger">{{ $errors->first('image') }}</div>
                                    @enderror
                                </div>
                                 <br>
        
                                <div class="border  p-3">
        
                                    @foreach($langs as $lang)
                                        <div class="form-group">
                                            <label for="alt_image">Alt Image  ({{ $lang->name }}) </label>
                                            <input type="text" name="alt_image[{{$lang->code}}]" class="form-control" id="alt_image" placeholder="Enter Alt Image" value="{{ $media->translate($lang->code)->alt_image }}">
                                            @error('alt_image.' . $lang->code)
                                            <div class="text-danger">{{ $errors->first('alt_image.' . $lang->code) }}</div>
                                            @enderror
                                        </div>
                                    @endforeach
                                </div>
                                <br>
        
        
                                <div class="border p-3">
                                    @foreach($langs as $lang)
                                        <div class="form-group">
                                            <label for="title_image">Title Image  ({{ $lang->name }}) </label>
                                            <input type="text" name="title_image[{{$lang->code}}]" class="form-control" id="title_image" placeholder="Enter Title Image" value=" {{ $media->translate($lang->code)->title_image }}">
                                            @error('title_image.' . $lang->code)
                                            <div class="text-danger">{{ $errors->first('title_image.' . $lang->code) }}</div>
                                            @enderror
                                        </div>
                                    @endforeach
                                </div>
        
                                 <br>








 

                    </div>



                    <div class="card-footer">
                        <button type="submit" class="btn btn-info"> <i class="nav-icon fas fa-paper-plane"></i> Submit</button>
                    </div>


                </form>
            </div>

        </div>
    </section>





@endsection
