@extends('admin.layout.master')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Categories </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Categories</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div>

                <a href="{{route('admin.category.add')}}" style="color: #FFF">
                    <button class="btn btn-info" >
                        <i class="nav-icon fas fa-plus"></i> Add New Category
                    </button>
                </a>

            </div>
            <br>
            <div class="card card-info">

                <div class="card-header">
                    <h3 class="card-title">All Categories</h3>

                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Photo</th>
                             @foreach($langs as $lang)
                                 <th>name ({{$lang->code}})</th>
                             @endforeach
                            <th>type</th>
                            <th>Action</th>

                        </tr>
                        </thead>
                        <tbody>

                        @forelse($categories as $cat)
                            <tr>
                                <td>{{$cat->id}}</td>
                                <td>
                                    <img src="{{asset('uploads/images/category/'. $cat->photo)}}" width="150px" height="150px">
                                </td>
                                @foreach($langs as $lang)
                                <td>{{(isset($cat->translate($lang->code)->name) ? $cat->translate($lang->code)->name : '')}}</td>
                                @endforeach
                                <td>
                                    @if($cat->type == 0)
                                         <span class="badge badge-danger">Parent</span>
                                    @else
                                        <span class="badge badge-primary"> Child </span>

                                    @endif
                                </td>
                                <td>
                                    <a href="{{route('admin.category.edit' ,  ['id' => $cat->id])}}">
                                        <button class="btn btn-sm btn-info"> <i class="nav-icon fas fa-edit"></i> Edit</button>
                                    </a>

                                    @if($cat->deleted_at == null)

                                        <a href="{{route('admin.category.soft_delete' ,  ['id' => $cat->id])}}">
                                            <button class="btn btn-sm btn-info"><i class="nav-icon fas fa-trash"></i> Soft Delete</button>
                                        </a>
                                    @else
                                        <a href="{{route('admin.category.restore' ,  ['id' => $cat->id])}}">
                                            <button class="btn btn-sm btn-info"><i class="nav-icon fas fa-trash-restore"></i> Restore</button>
                                        </a>
                                    @endif





                                    <a href="{{route('admin.category.destroy' ,  ['id' => $cat->id])}}">
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
