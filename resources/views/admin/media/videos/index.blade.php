@extends('admin.layout.master')
@section('styles')
    <style>
        iframe{
            width: 300px;
            height: 253px;
        }
    </style>
@endsection
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Videos </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Home</a></li>
                        <li class="breadcrumb-item active">Videos</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div>

                <a href="{{route('admin.videos.add')}}" style="color: #FFF">
                    <button class="btn btn-info" >
                        <i class="nav-icon fas fa-plus"></i> Add New Video
                    </button>
                </a>

            </div>
            <br>
            <div class="card card-info">

                <div class="card-header">
                    <h3 class="card-title">All Videos</h3>

                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Image</th>
                            <th>video</th>
                            @foreach($langs as $lang)
                                <th>name ({{$lang->code}})</th>
                            @endforeach
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>

                        @forelse($videos as $vid)
                            <tr>
                                <td>
                                    <img src="{{asset('uploads/images/media/videos/'. $vid->image)}}" width="200px" height=200px">
                                </td>

                                <td style="height: 200px; width: 200px">
                                    {!!  $vid->link  !!}
                                </td>
                                @foreach($langs as $lang)
                                    <td>{{$vid->translate($lang->code)->name}}</td>
                                @endforeach
                                <td>
                                    <a href="{{route('admin.videos.edit' ,  ['id' => $vid->id])}}">
                                        <button class="btn btn-sm btn-info"> <i class="nav-icon fas fa-edit"></i> Edit</button>
                                    </a>

                                    @if($vid->deleted_at == null)

                                        <a href="{{route('admin.videos.soft_delete' ,  ['id' => $vid->id])}}">
                                            <button class="btn btn-sm btn-info"><i class="nav-icon fas fa-trash"></i> Soft Delete</button>
                                        </a>
                                    @else
                                        <a href="{{route('admin.videos.restore' ,  ['id' => $vid->id])}}">
                                            <button class="btn btn-sm btn-success"><i class="nav-icon fas fa-trash-restore"></i> Restore</button>
                                        </a>
                                    @endif


                                    <a href="{{route('admin.videos.destroy' ,  ['id' => $vid->id])}}">
                                        <button class="btn btn-sm btn-danger"><i class="nav-icon fas fa-trash"></i> Remove</button>
                                    </a>

                                </td>

                            </tr>
                        @empty
                            <tr>
                                <td colspan="3"> No Data</td>
                            </tr>
                        @endforelse


                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </section>

@endsection
