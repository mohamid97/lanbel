@extends('admin.layout.master')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Users </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Users</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">

            <br>
            <div class="card card-info">

                <div class="card-header">
                    <h3 class="card-title">All Users</h3>

                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Avatar</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Action</th>

                        </tr>
                        </thead>
                        <tbody>

                        @forelse($accounts as $index => $account)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>
                                    <img src="{{asset('uploads/images/users/'. $account->avatar)}}" width="150px" height="150px">
                                </td>
                                <td>{{$account->first_name}} {{ $account->last_name }}</td>
                                <td>{{$account->email}} </td>
                                <td>{{$account->phone}} </td>
                                <td>
                                    <a href="{{route('admin.users.edit' ,  ['id' => $account->id])}}">
                                        <button class="btn btn-sm btn-info"> <i class="nav-icon fas fa-edit"></i> Edit</button>
                                    </a>

                                    @if($account->deleted_at == null)

                                        <a href="{{route('admin.users.soft_delete' ,  ['id' => $account->id])}}">
                                            <button class="btn btn-sm btn-info"><i class="nav-icon fas fa-trash"></i> Soft Delete</button>
                                        </a>
                                    @else
                                        <a href="{{route('admin.users.restore' ,  ['id' => $account->id])}}">
                                            <button class="btn btn-sm btn-info"><i class="nav-icon fas fa-trash-restore"></i> Restore</button>
                                        </a>
                                    @endif


                                    <a href="{{route('admin.users.destroy' ,  ['id' => $account->id])}}">
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
