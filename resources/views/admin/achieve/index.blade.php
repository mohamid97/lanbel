@extends('admin.layout.master')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>About Us</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Achievement</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">

            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Achievement</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" method="post" action="{{route('admin.ach.update')}}" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="card-body">



                        <div class="form-group">
                            <label for="years_exp">Years Of Experience</label>
                            <input type="text" name="years_exp" class="form-control" id="years_exp" placeholder="Enter Years Experience" value="{{ $achieve->years_exp }}">
                            @error('years_exp')
                            <div class="text-danger">{{ $errors->first('years_exp') }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="number_of_clients">Number Of Clients</label>
                            <input type="text" name="number_of_clients" class="form-control" id="number_of_clients" placeholder="Enter Number Of Clients" value="{{ $achieve->number_of_clients }}">
                            @error('number_of_clients')
                            <div class="text-danger">{{ $errors->first('number_of_clients') }}</div>
                            @enderror
                        </div>



                        <div class="form-group">
                            <label for="number_of_clients">Number Of Departments</label>
                            <input type="text" name="number_of_deps" class="form-control" id="number_of_deps" placeholder="Enter Number Of Departments" value="{{ $achieve->number_of_deps }}">
                            @error('number_of_deps')
                            <div class="text-danger">{{ $errors->first('number_of_deps') }}</div>
                            @enderror
                        </div>



                        <div class="form-group">
                            <label for="number_of_products">Number Of Products</label>
                            <input type="text" name="number_of_products" class="form-control" id="number_of_products" placeholder="Enter Number Of Products" value="{{ $achieve->number_of_products }}">
                            @error('number_of_products')
                            <div class="text-danger">{{ $errors->first('number_of_products') }}</div>
                            @enderror
                        </div>




                        <div class="form-group">
                            <label for="number_of_emps">Number Of Employees</label>
                            <input type="text" name="number_of_emps" class="form-control" id="number_of_emps" placeholder="Enter Number Of Employees" value="{{ $achieve->number_of_emps }}">
                            @error('number_of_emps')
                            <div class="text-danger">{{ $errors->first('number_of_emps') }}</div>
                            @enderror
                        </div>




                        <div class="form-group">
                            <label for="num1">Number Of num 1</label>
                            <input type="text" name="num1" class="form-control" id="num1" placeholder="Enter Number 1" value="{{ $achieve->num1 }}">
                            @error('num1')
                            <div class="text-danger">{{ $errors->first('num1') }}</div>
                            @enderror
                        </div>



                        <div class="form-group">
                            <label for="num2">Number Of num 2</label>
                            <input type="text" name="num2" class="form-control" id="num2" placeholder="Enter Number 2" value="{{ $achieve->num2 }}">
                            @error('num2')
                            <div class="text-danger">{{ $errors->first('num2') }}</div>
                            @enderror
                        </div>


                        <div class="form-group">
                            <label for="number_of_emps">Number Of num 3</label>
                            <input type="text" name="num3" class="form-control" id="num3" placeholder="Enter Number Of num 3" value="{{ $achieve->num3 }}">
                            @error('num3')
                            <div class="text-danger">{{ $errors->first('num3') }}</div>
                            @enderror
                        </div>


                        <div class="form-group">
                            <label for="number_of_emps">Number Of num 4</label>
                            <input type="text" name="num4" class="form-control" id="num4" placeholder="Enter Number 4" value="{{ $achieve->num4 }}">
                            @error('num4')
                            <div class="text-danger">{{ $errors->first('num4') }}</div>
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


