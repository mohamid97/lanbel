@extends('admin.layout.master')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>About Us</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">About Us </li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">

            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">About Us</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" method="post" action="{{route('admin.about.update' , ['id'=> $about->id])}}" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="card-body">

                        <div class="border  p-3">
                        @foreach($langs as $lang)
                            <div class="form-group">
                                <label for="name">Name ({{ $lang->name }}) </label>
                                <input type="text" name="name[{{$lang->code}}]" class="form-control" id="name" placeholder="Enter Name" value="{{isset($about->translate($lang->code)->name)?$about->translate($lang->code)->name:''}}">
                                @error('name.' . $lang->code)
                                <div class="text-danger">{{ $errors->first('name.' . $lang->code) }}</div>
                                @enderror
                            </div>
                        @endforeach
                        </div>
                        <br>





                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="text" name="phone" class="form-control" id="phone" placeholder="Enter phone" value="{{ $about->phone }}">
                            @error('phone')
                            <div class="text-danger">{{ $errors->first('phone') }}</div>
                            @enderror
                        </div>

                         <br>

                            <div class="border  p-3">
                            @foreach($langs as $index => $lang)


                                <div class="form-group">
                                    <label for="des">Description ({{$lang->name}})</label>
                                    <textarea name="des[{{$lang->code}}]" class="ckeditor">
                                      {{isset($about->translate($lang->code)->des)?$about->translate($lang->code)->des:''}}
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
                                    <input name="photo" type="file" class="custom-file-input" id="image">
                                    <label class="custom-file-label" for="image">Choose Image</label>
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text" id="">Upload</span>
                                </div>
                            </div>
                            @if($about->photo && $about->photo != null)
                                <img src="{{asset('uploads/images/about/'. $about->photo)}}" width="150px" height="150px">

                            @endif

                            @error('photo')
                            <div class="text-danger">{{ $errors->first('photo') }}</div>
                            @enderror
                        </div>


                        <br>
                        <div class="border  p-3">

                            @foreach($langs as $lang)
                                <div class="form-group">
                                    <label for="alt_image">Alt Image  ({{ $lang->name }}) </label>
                                    <input type="text" name="alt_image[{{$lang->code}}]" class="form-control" id="alt_image" placeholder="Enter Alt Image" value="{{isset($about->translate($lang->code)->alt_image)?$about->translate($lang->code)->alt_image:''}} ">
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
                                    <input type="text" name="title_image[{{$lang->code}}]" class="form-control" id="title_image" placeholder="Enter Title Image" value="{{isset($about->translate($lang->code)->title_image)?$about->translate($lang->code)->title_image:''}}">
                                    @error('title_image.' . $lang->code)
                                    <div class="text-danger">{{ $errors->first('title_image.' . $lang->code) }}</div>
                                    @enderror
                                </div>
                            @endforeach
                        </div>






                            <br>

                            <div class="border  p-3">

                                @foreach($langs as $index => $lang)

                                    <div class="form-group">
                                        <label for="meta_title">Meta Title ({{$lang->name}})</label>
                                        <textarea name="meta_title[{{$lang->code}}]" class="ckeditor">
                                            @if (isset($about->translate($lang->code)->meta_title))
                                            {!! $about->translate($lang->code)->meta_title !!}
                                                
                                            @endif
                                    </textarea>

                                        @error('meta_title.' . $lang->code)
                                        <div class="text-danger">{{ $errors->first('meta_title.' . $lang->code) }}</div>
                                        @enderror
                                    </div>
                                @endforeach

                            </div>

                             <br>

                            <div class="border  p-3">


                                @foreach($langs as $index => $lang)
                                    <div class="form-group">
                                        <label for="meta_des">Meta Description ({{$lang->name}})</label>
                                        <textarea name="meta_des[{{$lang->code}}]"  class="ckeditor">
                                            @if (isset($about->translate($lang->code)->meta_des))
                                            {!! $about->translate($lang->code)->meta_des !!}
                                                
                                            @endif
                                         
                                    </textarea>

                                        @error('meta_des.' . $lang->code)
                                        <div class="text-danger">{{ $errors->first('meta_des.' . $lang->code) }}</div>
                                        @enderror
                                    </div>
                                @endforeach

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


