@extends('admin.layout.master')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Test Package </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Home</a></li>
                        <li class="breadcrumb-item active">Test Package  </li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div>

                    <a href="{{route('admin.tests.add')}}" style="color: #FFF">
                        <button class="btn btn-info" >
                            <i class="nav-icon fas fa-plus"></i> Add New Test
                        </button>
                    </a>

            </div>
            <br>
            <div class="card card-info">

                <div class="card-header">
                    <h3 class="card-title">All Test Package</h3>

                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Action</th>

                        </tr>
                        </thead>
                        <tbody>

                        @forelse($tests as $index => $test)
                            <tr>
                                <td>{{ $index +1  }} </td>
                                <td>
                                    <img src="{{asset('uploads/images/tests/'. $test->image)}}" width="150px" height="150px">
                                </td>
                                <td>{{ $test->translate(app()->getLocale())->title }}</td>
                                <td>
                                    <a href="{{route('admin.tests.edit' ,  ['id' => $test->id])}}">
                                        <button class="btn btn-sm btn-info"> <i class="nav-icon fas fa-edit"></i> Edit</button>
                                    </a>

                                    @if($test->deleted_at == null)

                                        <a href="{{route('admin.tests.soft_delete' ,  ['id' => $test->id])}}">
                                            <button class="btn btn-sm btn-info"><i class="nav-icon fas fa-trash"></i> Soft Delete</button>
                                        </a>
                                    @else
                                        <a href="{{route('admin.tests.restore' ,  ['id' => $test->id])}}">
                                            <button class="btn btn-sm btn-success"><i class="nav-icon fas fa-trash-restore"></i> Restore</button>
                                        </a>
                                    @endif


                                    <a href="{{route('admin.tests.destroy' ,  ['id' => $test->id])}}">
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