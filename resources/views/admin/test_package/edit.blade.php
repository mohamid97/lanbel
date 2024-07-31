@extends('admin.layout.master')

@section('content')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Test Package</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Edit Test Package </li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">

            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Tests </h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" method="post" action="{{route('admin.tests.update' , ['id'=> $test->id]) }}"  enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="card-body">

                        <div class="border  p-3">
                        @foreach($langs as $lang)
                            <div class="form-group">
                                <label for="title">Title ({{ $lang->name }}) </label>
                                <input type="text" name="title[{{$lang->code}}]" class="form-control" id="title" placeholder="Enter Title" value="{{ isset($test->translate($lang->code)->title)? $test->translate($lang->code)->title:'' }}">
                                @error('title.' . $lang->code)
                                <div class="text-danger">{{ $errors->first('title.' . $lang->code) }}</div>
                                @enderror
                            </div>
                        @endforeach
                        </div>
                        <br>














                        <div class="border  p-3">

                        @foreach($langs as $index => $lang)

                            <div class="form-group">
                                <label for="image">Description ({{$lang->name}})</label>
                                <textarea name="des[{{$lang->code}}]" class="ckeditor">

                                    @if (isset($test->translate($lang->code)->des))
                                       {!! $test->translate($lang->code)->des  !!}
                                    @endif
                                    

                                </textarea>

                                @error('des.' . $lang->code)
                                <div class="text-danger">{{ $errors->first('des.' . $lang->code) }}</div>
                                @enderror
                            </div>
                        @endforeach
                        </div>
                        <br>




                        <div class="border  p-3">

                            @foreach($langs as $index => $lang)
    
                                <div class="form-group">
                                    <label for="image">Small Desription ({{$lang->name}})</label>
                                    <textarea name="small_des[{{$lang->code}}]" class="ckeditor">
    
                                        @if (isset($test->translate($lang->code)->des))
                                           {!! $test->translate($lang->code)->des  !!}
                                        @endif
                                        
    
                                    </textarea>
    
                                    @error('small_des.' . $lang->code)
                                    <div class="text-danger">{{ $errors->first('small_des.' . $lang->code) }}</div>
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
                            <img src="{{asset('uploads/images/tests/'. $test->image)}}" width="150px" height="150px">
                            @error('image')
                            <div class="text-danger">{{ $errors->first('image') }}</div>
                            @enderror
                        </div>

                        <br>













{{--                        <div class="form-group">--}}
{{--                            <label>Category</label>--}}
{{--                            <select type="text" name="category" class="form-control">--}}
{{--                                <option value="0">Select Category</option>--}}
{{--                                @forelse($categories as $category)--}}
{{--                                    <option value="{{$category->id}}">{{$category->translate($langs[0]->code)->name}}</option>--}}
{{--                                @empty--}}
{{--                                @endforelse--}}

{{--                            </select>--}}
{{--                            @error('category')--}}
{{--                            <div class="text-danger">{{ $errors->first('category') }}</div>--}}
{{--                            @enderror--}}
{{--                        </div>--}}


                    </div>



                    <div class="card-footer">
                        <button type="submit" class="btn btn-info"> <i class="nav-icon fas fa-paper-plane"></i> Update</button>
                    </div>


                </form>
            </div>

        </div>
    </section>
@endsection

