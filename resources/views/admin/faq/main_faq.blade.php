@extends('admin.layout.master')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Main Faq</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Main Faq </li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">

            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Main Faq</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" method="post" action="{{route('admin.main_faq.update')}}" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="card-body">

                        <div class="border  p-3">
                        @foreach($langs as $lang)
                            <div class="form-group">
                                <label for="title">Title ({{ $lang->name }}) </label>
                                <input type="text" name="title[{{$lang->code}}]" class="form-control" id="title" placeholder="Enter Title" value="{{(isset($main_faq) && isset($main_faq->translate($lang->code)->title))?$main_faq->translate($lang->code)->title:''}}">
                                @error('title.' . $lang->code)
                                <div class="text-danger">{{ $errors->first('title.' . $lang->code) }}</div>
                                @enderror
                            </div>
                        @endforeach
                        </div>
                        <br>


                         <br>

                            <div class="border  p-3">
                            @foreach($langs as $index => $lang)


                                <div class="form-group">
                                    <label for="des">Description ({{$lang->name}})</label>
                                    <textarea name="des[{{$lang->code}}]" class="ckeditor">
                                      {{(isset($main_faq) && isset($main_faq->translate($lang->code)->des) )?$main_faq->translate($lang->code)->des:''}}
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
                            @if(isset($main_faq) &&  $main_faq->image && $main_faq->image != null)
                                <img src="{{asset('uploads/images/main_faq/'. $main_faq->image)}}" width="150px" height="150px">
                            @endif

                            @error('main_faq')
                            <div class="text-danger">{{ $errors->first('main_faq') }}</div>
                            @enderror
                        </div>


                        <br>
                        <div class="border  p-3">

                            @foreach($langs as $lang)
                                <div class="form-group">
                                    <label for="alt_image">Alt Image  ({{ $lang->name }}) </label>
                                    <input type="text" name="alt_image[{{$lang->code}}]" class="form-control" id="alt_image" placeholder="Enter Alt Image" value="{{(isset($main_faq) && isset($main_faq->translate($lang->code)->alt_image))?$main_faq->translate($lang->code)->alt_image:''}} ">
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
                                    <input type="text" name="title_image[{{$lang->code}}]" class="form-control" id="title_image" placeholder="Enter Title Image" value="{{(isset($main_faq) && isset($main_faq->translate($lang->code)->title_image) )?$main_faq->translate($lang->code)->title_image:''}}">
                                    @error('title_image.' . $lang->code)
                                    <div class="text-danger">{{ $errors->first('title_image.' . $lang->code) }}</div>
                                    @enderror
                                </div>
                            @endforeach
                        </div>


                            <br>









                    </div>



                    <div class="card-footer">
                        <button type="submit" class="btn btn-info"> <i class="nav-icon fas fa-paper-plane"></i> Update</button>
                    </div>


                </form>
            </div>

        </div>
    </section>
@endsection


