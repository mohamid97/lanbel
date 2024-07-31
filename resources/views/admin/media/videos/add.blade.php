@extends('admin.layout.master')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Add Videos</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Videos </li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">

            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Videos</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" method="post" action="{{route('admin.videos.store')}}" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="card-body">
                        @foreach($langs as $lang)
                            <div class="form-group">
                                <label for="name">Name ({{ $lang->name }}) </label>
                                <input type="text" name="name[{{$lang->code}}]" class="form-control" id="name" placeholder="Enter Name" value="{{ old('name.' . $lang->code) }}">
                                @error('name.' . $lang->code)
                                <div class="text-danger">{{ $errors->first('name.' . $lang->code) }}</div>
                                @enderror
                            </div>
                        @endforeach







                        <div class="form-group">
                            <label for="image">Photo</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input name="photo" type="file" class="custom-file-input" id="image">
                                    <label class="custom-file-label" for="image">Choose Photo</label>
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text" id="">Upload</span>
                                </div>
                            </div>

                            @error('photo')
                            <div class="text-danger">{{ $errors->first('photo') }}</div>
                            @enderror
                        </div>


                        <br>
                        <div class="form-group">
                            <label for="link">Link</label>
                            <input type="text" name="link" class="form-control" id="link" placeholder="Enter Link " value="{{ old('link') }}">
                            @error('link')
                            <div class="text-danger">{{ $errors->first('link') }}</div>
                            @enderror
                        </div>


                        <br>


                        <div class="border p-3">
                            @foreach($langs as $lang)
                                <div class="form-group">
                                    <label for="des">Description ({{ $lang->name }}) </label>
                                    <input type="text" name="des[{{$lang->code}}]" class="form-control" id="des" placeholder="Enter Description" value="{{ old('des.' . $lang->code) }}">
                                    @error('des.' . $lang->code)
                                    <div class="text-danger">{{ $errors->first('des.' . $lang->code) }}</div>
                                    @enderror
                                </div>
                            @endforeach
                        </div>



            
                             
                            <div class="form-group">
                                <label for="title_image">Media Group   </label>
                                <select type="text" name="group_media" class="form-control" id="group_media">
                                    @foreach ($media_groups as $media )
                                        <option value="{{ $media->id }}">{{ $media->name }}</option>
                                    @endforeach
                                </select>
                                @error('group_media')
                                <div class="text-danger">{{ $errors->first('group_media') }}</div>
                                @enderror
                            </div>
                 
 







                    </div>



                    <div class="card-footer">
                        <button type="submit" class="btn btn-info"> <i class="nav-icon fas fa-paper-plane"></i> Submit</button>
                    </div>


                </form>
            </div>

        </div>
    </section>





@endsection
