@extends('admin.layout.master')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Add Category</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Add Category </li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">

            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Category</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form role="form" method="post" action="{{route('admin.category.store') }}" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="card-body">

                        <div class="border  p-3">
                            @foreach($langs as $lang)
                                <div class="form-group">
                                    <label for="name">Name ({{ $lang->name }}) </label>
                                    <input type="text" name="name[{{$lang->code}}]" class="form-control" id="name" placeholder="Enter Name" value="{{ old('name.' . $lang->code) }}">
                                    @error('name.' . $lang->code)
                                    <div class="text-danger">{{ $errors->first('name.' . $lang->code) }}</div>
                                    @enderror
                                </div>
                            @endforeach
                        </div>
                        <br>
                        <div class="border  p-3">
                            @foreach($langs as $lang)
                                <div class="form-group">
                                    <label for="slug">Slug ({{ $lang->name }}) </label>
                                    <input type="text" name="slug[{{$lang->code}}]" class="form-control" id="name" placeholder="Enter Slug" value="{{ old('slug.' . $lang->code) }}">
                                    @error('slug.' . $lang->code)
                                    <div class="text-danger">{{ $errors->first('slug.' . $lang->code) }}</div>
                                    @enderror
                                </div>
                            @endforeach
                        </div>
                        <br>


                        <div class="form-group" >
                            <label>Type</label>
                            <select type="text" name="type" class="form-control" id="type">
                                <option value="0">Parent</option>
                                <option value="1">Child</option>
                            </select>
                            @error('type')
                            <div class="text-danger">{{ $errors->first('type') }}</div>
                            @enderror
                        </div>




                        <div class="form-group" id="parent_id_field">
                            <label>Type</label>
                            <select type="text" name="parent_id" class="form-control">
                                <option disabled>Select Category</option>
                                @forelse($categories as $category)
                                    <option value="{{$category->id}}">{{$category->translate($langs[0]->code)->name}}</option>
                                @empty
                                @endforelse

                            </select>
                            @error('parent_id')
                            <div class="text-danger">{{ $errors->first('parent_id') }}</div>
                            @enderror
                        </div>

                        <div class="border  p-3">
                            @foreach($langs as $index => $lang)


                                <div class="form-group">
                                    <label for="small_des">Small Description ({{$lang->name}})</label>
                                    <input name="small_des[{{$lang->code}}]" class="form-control" />
                                    @error('small_des.' . $lang->code)
                                    <div class="text-danger">{{ $errors->first('small_des.' . $lang->code) }}</div>
                                    @enderror
                                </div>
                            @endforeach
                        </div>


                        <div class="border  p-3">
                            @foreach($langs as $index => $lang)


                                <div class="form-group">
                                    <label>Description ({{$lang->name}})</label>
                                    <textarea name="des[{{$lang->code}}]" class="ckeditor">

                                    </textarea>

                                    @error('des.' . $lang->code)
                                    <div class="text-danger">{{ $errors->first('des.' . $lang->code) }}</div>
                                    @enderror
                                </div>
                            @endforeach
                        </div>

                        <br>

                        <div class="border  p-3">
                        @foreach($langs as $index => $lang)

                        <div class="form-group">
                            <label for="meta_title">Meta Title ({{$lang->name}})</label>
                            <textarea name="meta_title[{{$lang->code}}]" class="ckeditor">

                            </textarea>

                            @error('meta_title.' . $lang->code)
                            <div class="text-danger">{{ $errors->first('meta_title.' . $lang->code) }}</div>
                            @enderror
                        </div>
                    @endforeach
                        </div>
                        <br>



                        <div class="border  p-3">
                            @foreach($langs as $index => $lang)
                                <div class="form-group">
                                    <label for="meta_des">Meta Description ({{$lang->name}})</label>
                                    <textarea name="meta_des[{{$lang->code}}]" class="ckeditor">

                                    </textarea>

                                    @error('meta_des.' . $lang->code)
                                    <div class="text-danger">{{ $errors->first('meta_des.' . $lang->code) }}</div>
                                    @enderror
                                </div>
                            @endforeach
                        </div>
                        <br>


                        <div class="form-group">
                            <label for="image">Image</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input name="photo" type="file" class="custom-file-input" id="image">
                                    <label class="custom-file-label" for="image">Choose Image</label>
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text" id="">Upload</span>
                                </div>
                            </div>

                            @error('photo')
                            <div class="text-danger">{{ $errors->first('photo') }}</div>
                            @enderror
                        </div>


                        <br>
                        <div class="border  p-3">

                            @foreach($langs as $lang)
                                <div class="form-group">
                                    <label for="alt_image">Alt Image  ({{ $lang->name }}) </label>
                                    <input type="text" name="alt_image[{{$lang->code}}]" class="form-control" id="alt_image" placeholder="Enter Alt Image" value="{{ old('alt_image.' . $lang->code) }}">
                                    @error('alt_image.' . $lang->code)
                                    <div class="text-danger">{{ $errors->first('alt_image.' . $lang->code) }}</div>
                                    @enderror
                                </div>
                            @endforeach
                        </div>
                        <br>


                        <div class="border p-3">
                            @foreach($langs as $lang)
                                <div class="form-group">
                                    <label for="title_image">Title Image  ({{ $lang->name }}) </label>
                                    <input type="text" name="title_image[{{$lang->code}}]" class="form-control" id="title_image" placeholder="Enter Title Image" value="{{ old('title_image.' . $lang->code)  }}">
                                    @error('title_image.' . $lang->code)
                                    <div class="text-danger">{{ $errors->first('title_image.' . $lang->code) }}</div>
                                    @enderror
                                </div>
                            @endforeach
                        </div>

                        <br>


                        <div class="form-group">

                            <div class="row">
                                <div class="col-md-8">
                                    <lable>Star</lable>
                                </div>
                                <div class="col-md-4">
                                    <div class="custom-control custom-checkbox">
                                        <input name="star" type="checkbox" class="custom-control-input" id="customCheck2">
                                        <label class="custom-control-label" for="customCheck2"></label>
                                    </div>
                                </div>
                            </div>
                            @error('start')
                            <div class="text-danger">{{ $errors->first('start') }}</div>
                            @enderror
                        </div>





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
