@extends('theme.default')

@section('title')
    Create new Book
@endsection

@section('content')
    <div class="row">
        <div class="card mb-4 col-md-8">
            <div class="card-header">
               Create new category
            </div>
            <div class="card-body">
                <form action="{{route('categories.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row form-group">
                        <label for="name" class="col-md-4 col-form-label text-md-left">Category Name</label>
                        <div class="col-md-6">
                            <input name="name" class="form-control @error('name') is-invalid @enderror" id="name" type="text" value="{{old('name')}}" autocomplete="name">
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                            @enderror
                        </div>
                    </div>




                    <div class="row form-group">
                        <label for="description" class="col-md-4 col-form-label text-md-left">Description</label>
                        <div class="col-md-6">
                            <textarea name="description"  rows="4" class="form-control   @error('description') is-invalid @enderror" id="description" type="text" autocomplete="description">  </textarea>

                            @error('description')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                            @enderror
                        </div>
                    </div>



                    <div class="form-group row mb-0">
                        <div class="col-md-1">
                            <button class="btn btn-primary" type="submit">Add </button>
                        </div>

                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection


