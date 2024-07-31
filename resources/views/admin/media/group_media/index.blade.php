@extends('admin.layout.master')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Files </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Home</a></li>
                        <li class="breadcrumb-item active">Media Group</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div>
                <a href="{{route('admin.media_group.add')}}" style="color: #FFF">
                    <button class="btn btn-info" >
                        <i class="nav-icon fas fa-plus"></i> Add New Group Media
                    </button>
                </a>
            </div>
            <br>
            <div class="card card-info">

                <div class="card-header">
                    <h3 class="card-title">All Media Group</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>name</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($medias as $index => $media)
                            <tr>

                                    <td>{{ $index + 1 }}</td>
                                    <td> {{ $media->name }} </td>
                                    <td>
                                    <a href="{{route('admin.group_media.edit' ,  ['id' => $media->id])}}">
                                        <button class="btn btn-sm btn-info"> <i class="nav-icon fas fa-edit"></i> Edit</button>
                                    </a>

                                    <a href="{{route('admin.group_media.edit' ,  ['id' => $media->id])}}">
                                        <button class="btn btn-sm btn-info"> <i class="nav-icon fas fa-edit"></i> Edit</button>
                                    </a>




 
                                    @if($media->deleted_at == null)

                                        <a href="{{route('admin.group_media.soft_delete' ,  ['id' => $media->id])}}">
                                            <button class="btn btn-sm btn-info"><i class="nav-icon fas fa-trash"></i> Soft Delete</button>
                                        </a>
                                    @else
                                        <a href="{{route('admin.group_media.restore' ,  ['id' => $media->id])}}">
                                            <button class="btn btn-sm btn-success"><i class="nav-icon fas fa-trash-restore"></i> Restore</button>
                                        </a>
                                    @endif





                                    <a href="{{route('admin.group_media.destroy' ,  ['id' => $media->id])}}">
                                        <button class="btn btn-sm btn-danger"><i class="nav-icon fas fa-trash"></i> Remove</button>
                                    </a>



                                    <a href="{{route('admin.group_media.files' ,  ['id' => $media->id])}}">
                                        <button class="btn btn-sm btn-success"> <i class="fa fa-microphone nav-icon"></i> Show Files</button>
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
