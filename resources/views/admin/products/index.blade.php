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

                <a href="{{route('admin.products.add')}}" style="color: #FFF">
                    <button class="btn btn-info" >
                        <i class="nav-icon fas fa-plus"></i> Add New Product
                    </button>
                </a>

            </div>
            <br>
            <div class="card card-info">

                <div class="card-header">
                    <h3 class="card-title">All Products</h3>

                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>#</th>

                            @foreach($langs as $lang)
                                <th>name ({{$lang->code}})</th>
                            @endforeach
                            <th>Category</th>
                            <th>Action</th>

                        </tr>
                        </thead>
                        <tbody>

                        @forelse($products as $index => $pro)
                            <tr>
                                <td>{{$index + 1 }}</td>

                                @foreach($langs as $lang)
                                    <td>{{isset($pro->translate($lang->code)->name) ? $pro->translate($lang->code)->name :''}}</td>
                                @endforeach

                                <td>
                                    @forelse($categories as $cat)
                                        @if($cat->id == $pro->category_id)
                                            <span class="badge badge-danger">{{$cat->translate($langs[0]->code)->name}}</span>
                                        @endif
                                    @empty

                                    @endforelse

                                </td>
                                <td>
                                    <a href="{{route('admin.products.edit' ,  ['id' => $pro->id])}}">
                                        <button class="btn btn-sm btn-info"> <i class="nav-icon fas fa-edit"></i> Edit</button>
                                    </a>

                                    @if($pro->deleted_at == null)

                                        <a href="{{route('admin.products.soft_delete' ,  ['id' => $pro->id])}}">
                                            <button class="btn btn-sm btn-info"><i class="nav-icon fas fa-trash"></i> Soft Delete</button>
                                        </a>
                                    @else
                                        <a href="{{route('admin.products.restore' ,  ['id' => $pro->id])}}">
                                            <button class="btn btn-sm btn-info"><i class="nav-icon fas fa-trash-restore"></i> Restore</button>
                                        </a>
                                    @endif


                                    <a href="{{route('admin.products.gallery' ,  ['id' => $pro->id])}}">
                                        <button class="btn btn-sm btn-success"> <i class="nav-icon fas fa-edit"></i> Show Gallary</button>
                                    </a>





                                    <a href="{{route('admin.products.destroy' ,  ['id' => $pro->id])}}">
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
