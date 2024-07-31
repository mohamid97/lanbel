@extends('admin.layout.master')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Messages From Contacts </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Home</a></li>
                        <li class="breadcrumb-item active">Messages</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">

            <div class="card card-info">

                <div class="card-header">
                    <h3 class="card-title">All Messages</h3>

                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Subject</th>
                            <th>Action</th>

                        </tr>
                        </thead>
                        <tbody>

                        @forelse($msgs as $index => $msg)
                            <tr>
                                <td>{{ $index + 1  }}</td>
                                <td>
                                    {{isset($msg->name) ? $msg->name : 'No Data'}}
                                </td>
                                <td>
                                    {{isset($msg->phone) ? $msg->phone : 'No Data'}}
                                </td>

                                <td>
                                    {{isset($msg->email) ? $msg->email : 'No Data'}}
                                </td>

                                <td>
                                    {{isset($msg->subject) ? $msg->subject : 'No Data'}}
                                </td>
                                <td>
                                    <a href="{{route('admin.messages.show' ,  ['id' => $msg->id])}}">
                                        <button class="btn btn-sm btn-info"> <i class="nav-icon fas fa-edit"></i> Show</button>
                                    </a>

                                    <a href="{{route('admin.messages.destroy' ,  ['id' => $msg->id])}}">
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
