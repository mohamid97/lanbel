@extends('admin.layout.master')

@section('content')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Update Event</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Update Event </li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">

            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Events</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" method="post" action="{{route('admin.events.update' , ['id'=> $event->id]) }}"  enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="card-body">

                        <div class="border  p-3">
                        @foreach($langs as $lang)
                            <div class="form-group">
                                <label for="title">Title ({{ $lang->name }}) </label>
                                <input type="text" name="title[{{$lang->code}}]" class="form-control" id="title" placeholder="Enter Title" value="{{ isset($event->translate($lang->code)->title)? $event->translate($lang->code)->title:'' }}">
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

                                    @if (isset($event->translate($lang->code)->des))
                                       {!! $event->translate($lang->code)->des  !!}
                                    @endif
                                    

                                </textarea>

                                @error('des.' . $lang->code)
                                <div class="text-danger">{{ $errors->first('des.' . $lang->code) }}</div>
                                @enderror
                            </div>
                        @endforeach
                        </div>
                        <br>


                       

                        <div class="form-group">
                            <label>Media</label>
                            <select type="text" name="group_media" class="form-control">
                                <option value="0">Select Media</option>
                                @forelse($medias as $media)
                                    <option value="{{$media->id}}"   {{ $media->id ==  $event->media_id ? 'selected' : ''}}> {{ $media->name }}</option>
                                @empty
                                @endforelse

                            </select>
                            @error('group_media')
                            <div class="text-danger">{{ $errors->first('group_media') }}</div>
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

