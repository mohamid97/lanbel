@extends('admin.layout.master')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Edit Status</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.appointments.update_home', ['id' => $appointment->id]) }}" method="POST">
                        @csrf
                      

                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name="status" id="status" class="form-control">
                                <option value="Pending" {{ $appointment->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                                <option value="Accepted" {{ $appointment->status == 'Accepted' ? 'selected' : '' }}>Accepted</option>
                                <option value="Finished" {{ $appointment->status == 'Finished' ? 'selected' : '' }}>Finished</option>
                                <option value="Declined" {{ $appointment->status == 'Declined' ? 'selected' : '' }}>Declined</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-success">Update Status</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection