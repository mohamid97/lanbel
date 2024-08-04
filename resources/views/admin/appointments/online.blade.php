@extends('admin.layout.master')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <form method="GET" action="{{ route('admin.appointments.online') }}" class="form-inline mb-3">
                    <div class="form-group mr-2">
                        <input type="text" name="name" class="form-control" placeholder="Search by Name" value="{{ request('name') }}">
                    </div>
                    <div class="form-group mr-2">
                        <select name="status" class="form-control">
                            <option value="">Filter by Status</option>
                            <option value="Pending" {{ request('status') == 'Pending' ? 'selected' : '' }}>Pending</option>
                            <option value="Accepted" {{ request('status') == 'Accepted' ? 'selected' : '' }}>Accepted</option>
                            <option value="Finished" {{ request('status') == 'Finished' ? 'selected' : '' }}>Finished</option>
                            <option value="Declined" {{ request('status') == 'Declined' ? 'selected' : '' }}>Declined</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Filter</button>
                </form>

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Appointments</h3>
                    </div>
                    <div class="card-body" style="overflow: scroll;">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Phone Number</th>
                                    <th>Email</th>
                                    <th>Address</th>
                                    <th>Nationality</th>
                                    <th>Birth Date</th>
                                    <th>Gender</th>
                                    <th>Booking Date</th>
                                    <th>Booking Time</th>
                                    <th>Status</th>
                                    <th>Test Type</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($appointments as $appointment)
                                    <tr>
                                        <td>{{ $appointment->id }}</td>
                                        <td>{{ $appointment->first_name }}</td>
                                        <td>{{ $appointment->last_name }}</td>
                                        <td>{{ $appointment->phone_number }}</td>
                                        <td>{{ $appointment->email }}</td>
                                        <td>{{ $appointment->address }}</td>
                                        <td>{{ $appointment->nationality }}</td>
                                        <td>{{ $appointment->birth_date }}</td>
                                        <td>{{ $appointment->gender }}</td>
                                        <td>{{ $appointment->booking_date }}</td>
                                        <td>{{ $appointment->booking_time }}</td>
                                        <td>{{ $appointment->status }}</td>
                                        <td>{{ $appointment->test_type }}</td>
                                        <td>
                                                    <a style="display: inline-block;margin-bottom:5px;" href="{{route('admin.appointments.destroy_online' ,  ['id' => $appointment->id ])}}">
                                                        <button class="btn btn-sm btn-danger"><i class="nav-icon fas fa-trash"></i> </button>
                                                    </a>  
                                                    <a href="{{route('admin.appointments.edit_online' ,  ['id' => $appointment->id])}}">
                                                        <button class="btn btn-sm btn-success"><i class="nav-icon fas fa-edit"></i> </button>
                                                    </a>
                                            <!-- يمكن إضافة أزرار تحرير وحذف هنا -->
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer">
                        {{ $appointments->appends(request()->query())->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
