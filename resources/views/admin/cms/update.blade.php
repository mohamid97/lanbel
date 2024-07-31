@extends('admin.layout.master')

@section('content')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Article</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Edit Article </li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">

            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Article</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" method="post" action="{{route('admin.cms.update' , ['id'=> $blog->id]) }}"  enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="card-body">

                        <div class="border  p-3">
                        @foreach($langs as $lang)
                            <div class="form-group">
                                <label for="title">Title ({{ $lang->name }}) </label>
                                <input type="text" name="title[{{$lang->code}}]" class="form-control" id="title" placeholder="Enter Title" value="{{ isset($blog->translate($lang->code)->name)? $blog->translate($lang->code)->name:'' }}">
                                @error('title.' . $lang->code)
                                <div class="text-danger">{{ $errors->first('title.' . $lang->code) }}</div>
                                @enderror
                            </div>
                        @endforeach
                        </div>
                        <br>



                        <div class="border  p-3">
                        
                            @foreach($langs as $lang)
                                <div class="form-group">
                                    <label for="slug">Slug ({{ $lang->name }}) </label>
                                    <input type="text" name="slug[{{$lang->code}}]" class="form-control" id="slug" placeholder="Enter Slug" value="{{ isset($blog->translate($lang->code)->slug) ? $blog->translate($lang->code)->slug : '' }}">
                                    @error('slug.' . $lang->code)
                                    <div class="text-danger">{{ $errors->first('slug.' . $lang->code) }}</div>
                                    @enderror
                                </div>
                            @endforeach
                        </div>
                        <br>


                        <div class="border  p-3">
                            @foreach($langs as $index => $lang)
    
                                <div class="form-group">
                                    <label for="small_des">Small Description ({{$lang->name}})</label>
                                    <textarea class="form-control" name="small_des[{{$lang->code}}]">
                                        @if (isset($blog->translate($lang->code)->small_des))
                                           {{ $blog->translate($lang->code)->small_des  }}
                                        @endif      
                                    </textarea>
    
                                    @error('small_des.' . $lang->code)
                                    <div class="text-danger">{{ $errors->first('small_des.' . $lang->code) }}</div>
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

                                    @if (isset($blog->translate($lang->code)->des))
                                       {!! $blog->translate($lang->code)->des  !!}
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
                                    <label for="meta_title">Meta Title ({{$lang->name}})</label>
                                    <textarea name="meta_title[{{$lang->code}}]" class="ckeditor">

                                        @if (isset($blog->translate($lang->code)->meta_title))
                                           {!! $blog->translate($lang->code)->meta_title  !!}
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
                                    <textarea name="meta_des[{{$lang->code}}]" class="ckeditor">

                                        @if (isset($blog->translate($lang->code)->meta_title))
                                            {!! $blog->translate($lang->code)->meta_des  !!}
                                        @endif
                                       

                                    </textarea>

                                    @error('meta_des.' . $lang->code)
                                    <div class="text-danger">{{ $errors->first('meta_des.' . $lang->code) }}</div>
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
                            <img src="{{asset('uploads/images/cms/'. $blog->image)}}" width="150px" height="150px">
                            @error('image')
                            <div class="text-danger">{{ $errors->first('image') }}</div>
                            @enderror
                        </div>
                        <br>
                        <div class="border  p-3">

                            @foreach($langs as $lang)
                                <div class="form-group">
                                    <label for="alt_image">Alt Image  ({{ $lang->name }}) </label>
                                    <input type="text" name="alt_image[{{$lang->code}}]" class="form-control" id="alt_image" placeholder="Enter Alt Image" value="{{  isset($blog->translate($lang->code)->alt_image) ? $blog->translate($lang->code)->alt_image :''   }}">
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
                                    <input type="text" name="title_image[{{$lang->code}}]" class="form-control" id="title_image" placeholder="Enter Title Image" value="{{  isset($blog->translate($lang->code)->title_image) ? $blog->translate($lang->code)->title_image :''   }}">
                                    @error('title_image.' . $lang->code)
                                    <div class="text-danger">{{ $errors->first('title_image.' . $lang->code) }}</div>
                                    @enderror
                                </div>
                            @endforeach
                        </div>









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

