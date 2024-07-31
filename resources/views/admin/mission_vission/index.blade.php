@extends('admin.layout.master')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Add Works</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Mission Vission </li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">

            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Our Mission And Vission </h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" method="post" action="{{route('admin.mission_vission.store')}}" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="card-body">

                        <div class="border  p-3">
                            @foreach($langs as $lang)
                                <div class="form-group">
                                    <label for="mission">Mission ({{ $lang->name }}) </label>
                                    <input type="text" name="mission[{{$lang->code}}]" class="form-control" id="mission" placeholder="Enter Mission" value="{{ isset($mission->translate($lang->code)->mission) ? $mission->translate($lang->code)->mission : '' }}">
                                    @error('mission.' . $lang->code)
                                    <div class="text-danger">{{ $errors->first('mission.' . $lang->code) }}</div>
                                    @enderror
                                </div>
                            @endforeach
                        </div>
                        </br>


                        <div class="border  p-3">
                            @foreach($langs as $lang)
                                <div class="form-group">
                                    <label for="vission">Vission ({{ $lang->name }}) </label>
                                    <input type="text" name="vission[{{$lang->code}}]" class="form-control" id="vission" placeholder="Enter Vission" value="{{ isset($mission->translate($lang->code)->vission) ? $mission->translate($lang->code)->vission : '' }}">
                                    @error('vission.' . $lang->code)
                                    <div class="text-danger">{{ $errors->first('vission.' . $lang->code) }}</div>
                                    @enderror
                                </div>
                            @endforeach
                        </div>
                        </br>




                        
                        <div class="border  p-3">
                            @foreach($langs as $lang)
                                <div class="form-group">
                                    <label for="services">Services ({{ $lang->name }}) </label>
                                    <input type="text" name="services[{{$lang->code}}]" class="form-control" id="services" placeholder="Enter Services" value="{{ isset($mission->translate($lang->code)->services) ? $mission->translate($lang->code)->services : '' }}">
                                    @error('services.' . $lang->code)
                                    <div class="text-danger">{{ $errors->first('services.' . $lang->code) }}</div>
                                    @enderror
                                </div>
                            @endforeach
                        </div>
                        </br>







                        <div class="border  p-3">
                            @foreach($langs as $lang)
                                <div class="form-group">
                                    <label for="breif">Breif ({{ $lang->name }}) </label>
                                    <input type="text" name="breif[{{$lang->code}}]" class="form-control" id="breif" placeholder="Enter breif" value="{{ isset($mission->translate($lang->code)->breif) ? $mission->translate($lang->code)->breif : '' }}">
                                    @error('breif' . $lang->code)
                                    <div class="text-danger">{{ $errors->first('breif' . $lang->code) }}</div>
                                    @enderror
                                </div>
                            @endforeach
                        </div>
                        </br>


                        <div class="border  p-3">
                            @foreach($langs as $lang)
                                <div class="form-group">
                                    <label for="about">About ({{ $lang->name }}) </label>
                                    <input type="text" name="about[{{$lang->code}}]" class="form-control" id="about" placeholder="Enter breif" value="{{ isset($mission->translate($lang->code)->about) ? $mission->translate($lang->code)->about : '' }}">
                                    @error('about' . $lang->code)
                                    <div class="text-danger">{{ $errors->first('about' . $lang->code) }}</div>
                                    @enderror
                                </div>
                            @endforeach
                        </div>
                        </br>







                    </div>



                    <div class="card-footer">
                        <button type="submit" class="btn btn-info"> <i class="nav-icon fas fa-paper-plane"></i> update</button>
                    </div>


                </form>
            </div>

        </div>
    </section>
@endsection
