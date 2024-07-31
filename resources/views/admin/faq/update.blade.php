@extends('admin.layout.master')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Update Faq</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Update Faq </li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">

            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Faq</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" method="post" action="{{route('admin.faq.update' , ['id' => $faq->id]) }}" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="card-body">

                        <div class="border  p-3">
                        @foreach($langs as $lang)
                            <div class="form-group">
                                <label for="name">Title ({{ $lang->name }}) </label>
                                <input type="text" name="title[{{$lang->code}}]" class="form-control" id="title" placeholder="Enter Title" value=" {{isset($faq->translate($lang->code)->title) ? $faq->translate($lang->code)->title : ''}} ">
                                @error('title.' . $lang->code)
                                <div class="text-danger">{{ $errors->first('title.' . $lang->code) }}</div>
                                @enderror
                            </div>
                        @endforeach
                        </div>
                        <br>


                        <div class="border  p-3">
                            @foreach($langs as $index => $lang)
                                <div class="form-group">
                                    <label for="image">Description ({{$lang->name}})</label>
                                    <textarea name="des[{{$lang->code}}]" class="ckeditor">
                                        @if (isset($faq->translate($lang->code)->des))
                                        {!! $faq->translate($lang->code)->des !!}  
                                        @endif                        
                                    </textarea>

                                    @error('des.' . $lang->code)
                                    <div class="text-danger">{{ $errors->first('des.' . $lang->code) }}</div>
                                    @enderror
                                </div>
                            @endforeach
                        </div>
                        <br>


                        
                        <div class="border  p-3">
                            @foreach($langs as $lang)
                                <div class="form-group">
                                    <label for="question">Title ({{ $lang->name }}) </label>
                                    <input type="text" name="question[{{$lang->code}}]" class="form-control" id="question" placeholder="Enter Question" value=" {{isset($faq->translate($lang->code)->question) ? $faq->translate($lang->code)->question : ''}} ">
                                    @error('question.' . $lang->code)
                                    <div class="text-danger">{{ $errors->first('question.' . $lang->code) }}</div>
                                    @enderror
                                </div>
                            @endforeach
                            </div>
                            <br>
    
    
                                <div class="border  p-3">
                                    @foreach($langs as $index => $lang)

                                        <div class="form-group">
                                            <label for="answer">Answer ({{$lang->name}})</label>
                                            <textarea name="answer[{{$lang->code}}]" class="ckeditor">
                                                @if (isset($faq->translate($lang->code)->answer))
                                                {!! $faq->translate($lang->code)->answer !!}  
                                                @endif    
                                            </textarea>
    
                                            @error('answer.' . $lang->code)
                                            <div class="text-danger">{{ $errors->first('answer .' . $lang->code) }} </div>
                                            @enderror
                                        </div>
                                    @endforeach
                                </div>
                                <br>


                                


                        <div class="form-group">
                            <label for="image">Image</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input name="image" type="file" class="custom-file-input" id="image">
                                    <label class="custom-file-label" for="image">Choose Image</label>
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text" id="">Upload</span>
                                </div>
                            </div>
                            <img src="{{asset('uploads/images/faq/'. $faq->image)}}" width="150px" height="150px">

                            @error('image')
                            <div class="text-danger">{{ $errors->first('image') }}</div>
                            @enderror
                        </div>


                        <div class="border  p-3">
                            @foreach($langs as $lang)
                                <div class="form-group">
                                    <label for="alt_image">Alt Image ({{ $lang->name }}) </label>
                                    <input type="text" name="alt_image[{{$lang->code}}]" class="form-control" id="alt_image" placeholder="Enter Alt Image" value=" {{isset($faq->translate($lang->code)->alt_image) ? $faq->translate($lang->code)->alt_image :''}} ">
                                    @error('alt_image.' . $lang->code)
                                    <div class="text-danger">{{ $errors->first('alt_image.' . $lang->code) }}</div>
                                    @enderror
                                </div>
                            @endforeach
                            </div>
                            <br>




                        <div class="border  p-3">
                            @foreach($langs as $lang)
                                <div class="form-group">
                                    <label for="title_image">Title Image ({{ $lang->name }}) </label>
                                    <input type="text" name="title_image[{{$lang->code}}]" class="form-control" id="title_image" placeholder="Enter Title Image" value=" {{isset($faq->translate($lang->code)->title_image) ? $faq->translate($lang->code)->title_image:''}} ">
                                    @error('title_image.' . $lang->code)
                                    <div class="text-danger">{{ $errors->first('title_image.' . $lang->code) }}</div>
                                    @enderror
                                </div>
                            @endforeach
                            </div>
                            <br>





                    </div>



                    <div class="card-footer">
                        <button type="submit" class="btn btn-info"> <i class="nav-icon fas fa-paper-plane"></i> Submit</button>
                    </div>


                </form>
            </div>

        </div>
    </section>
@endsection

@section('scripts')
    <script>
        $(document).ready(function(){
            // Hide the parent_id field initially
            $('#parent_id_field').hide();

            // Show/hide the parent_id field based on the selected value of type
            $('#type').change(function(){
                var selectedType = $(this).val();
                if(selectedType == 1) {
                    $('#parent_id_field').show();
                } else {
                    $('#parent_id_field').hide();
                }
            });
        });
    </script>
@endsection
