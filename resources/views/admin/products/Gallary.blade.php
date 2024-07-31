@extends('admin.layout.master')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Products </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Products</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>



    <section class="content">
        <div class="container-fluid">
            <div>
                <form method="post" action="{{route('admin.products.save_gallery' , ['id'=>$product->id])}}" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group">
                        <label for="image">Photo</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input name="photo" type="file" class="custom-file-input" id="image">
                                <label class="custom-file-label" for="image">Choose Photo</label>
                            </div>
                            <div class="input-group-append">
                                <span class="input-group-text" id="">Upload</span>
                            </div>
                        </div>

                        @error('photo')
                        <div class="text-danger">{{ $errors->first('photo') }}</div>
                        @enderror
                    </div>

                        <button class="btn btn-info" type="submit">
                            <i class="nav-icon fas fa-plus"></i> Add New Photo
                        </button>

                </form>



            </div>
            <br>
            <div class="card card-info">

                <div class="card-header">
                    <h3 class="card-title">Gallery</h3>

                </div>
                <!-- /.card-header -->
                <div class="card-body">

                    <div class="row">

                        @forelse($product->gallery as $gallery)
                            <div class="col-md-12 col-lg-6 col-xl-4">
                                <div class="card mb-2 bg-gradient-dark">
                                    <img height="300px" class="card-img-top" src="{{asset('uploads/images/gallery/'.$gallery->photo)}}" alt="Dist Photo 1">
                                    <a href="{{route('admin.products.delete_gallery' , ['id' => $gallery->id])}}" class="text-white">
                                        <button class="btn btn-sm btn-danger"><i class="nav-icon fas fa-trash"></i>  Delete </button>
                                    </a>
                                </div>
                            </div>
                        @empty
                           <p class="badge badge-danger"> No Photo</p>
                        @endforelse



                    </div>





                </div>

            </div>

        </div>

    </section>
@endsection
