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
                        <li class="breadcrumb-item active">Files</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div>
                <a href="{{route('admin.files.add')}}" style="color: #FFF">
                    <button class="btn btn-info" >
                        <i class="nav-icon fas fa-plus"></i> Add New File
                    </button>
                </a>
            </div>
            <br>
            <div class="card card-info">

                <div class="card-header">
                    <h3 class="card-title">All Files</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>File</th>
                            @foreach($langs as $lang)
                                <th>name ({{$lang->code}})</th>
                            @endforeach
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($files as $file)
                            <tr>
                                <td>
                                    <button class="btn btn-primary">
                                        <a target="_blank" style="color: #FFF" href="{{asset('uploads/images/media/files/'. $file->file)}}">
                                            Show
                                        </a>
                                    </button>
                                </td>
                                @foreach($langs as $lang)
                                    <td>{{$file->translate($lang->code)->name}}</td>
                                @endforeach
                                <td>
                                    <a href="{{route('admin.files.edit' ,  ['id' => $file->id])}}">
                                        <button class="btn btn-sm btn-info"> <i class="nav-icon fas fa-edit"></i> Edit</button>
                                    </a>

                                    @if($file->deleted_at == null)

                                        <a href="{{route('admin.files.soft_delete' ,  ['id' => $file->id])}}">
                                            <button class="btn btn-sm btn-info"><i class="nav-icon fas fa-trash"></i> Soft Delete</button>
                                        </a>
                                    @else
                                        <a href="{{route('admin.files.restore' ,  ['id' => $file->id])}}">
                                            <button class="btn btn-sm btn-success"><i class="nav-icon fas fa-trash-restore"></i> Restore</button>
                                        </a>
                                    @endif





                                    <a href="{{route('admin.files.destroy' ,  ['id' => $file->id])}}">
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
