@extends('admin.layout.master')

@section('content')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>FAQS </h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Home</a></li>
                    <li class="breadcrumb-item active">Faq</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<section class="content">
    <div class="container-fluid">
        <div>

            <a href="{{route('admin.faq.add')}}" style="color: #FFF">
                <button class="btn btn-info" >
                    <i class="nav-icon fas fa-plus"></i> Add New Faq
                </button>
            </a>
        </div>
        <br>
        <div class="card card-info">

            <div class="card-header">
                <h3 class="card-title">All Faqs</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Questions</th>
                        <th>Answer</th>
                        <th>Action</th>

                    </tr>
                    </thead>
                    <tbody>
                    @forelse($faqs as $faq)
                        <tr>
                            <td>
                                {{$faq->id}}
                            </td>
                   
                            <td>{{$faq->translate($langs[0]->code)->question}}</td>
                            <td>{!! substr($faq->translate($langs[0]->code)->answer, 0,100)  !!} </td>

                            <td>
                                <a href="{{route('admin.faq.edit' ,  ['id' => $faq->id])}}">
                                    <button class="btn btn-sm btn-info"> <i class="nav-icon fas fa-edit"></i> Edit</button>
                                </a>

                                @if($faq->deleted_at == null)

                                    <a href="{{route('admin.faq.soft_delete' ,  ['id' => $faq->id])}}">
                                        <button class="btn btn-sm btn-info"><i class="nav-icon fas fa-trash"></i> Soft Delete</button>
                                    </a>
                                @else
                                    <a href="{{route('admin.faq.restore' ,  ['id' => $faq->id])}}">
                                        <button class="btn btn-sm btn-success"><i class="nav-icon fas fa-trash-restore"></i> Restore</button>
                                    </a>
                                @endif
                                <a href="{{route('admin.faq.destroy' ,  ['id' => $faq->id])}}">
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