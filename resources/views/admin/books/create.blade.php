@extends('theme.default')

@section('title')
    Add New Book
@endsection

@section('content')
<div class="row">
    <div class="card mb-4 col-md-8">
          <div class="card-header">
          Add New Book
          </div>
        <div class="card-body">
            <form action="{{route('books.store')}}" method="POST" enctype="multipart/form-data">
               @csrf

                <div class="row form-group">
                    <label for="title" class="col-md-4 col-form-label text-md-left">Book Title</label>
                    <div class="col-md-6">
                        <input name="title" class="form-control @error('title') is-invalid @enderror" id="title" type="text" value="{{old('title')}}" autocomplete="title">
                        @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="row form-group">
                    <label for="ibsn" class="col-md-4 col-form-label text-md-left">ISBN</label>
                    <div class="col-md-6">
                        <input name="ibsn" class="form-control @error('ibsn') is-invalid @enderror" id="ibsn" type="text" value="{{old('ibsn')}}" autocomplete="ibsn">
                        @error('ibsn')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="row form-group">
                    <label for="cover_image" class="col-md-4 col-form-label text-md-left">Cover Image</label>
                    <div class="col-md-6">
                        <input name="cover_image" accept="image/*" onchange="readCoverImage(this);" class="form-control  @error('cover_image') is-invalid @enderror" id="cover_image" type="file" value="{{old('cover_image')}}" autocomplete="cover_image">
                        @error('cover_image')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror

                        <img id="cover-image-thumb" class="img-fluid img-thumbnail" src="">
                    </div>
                </div>


                <div class="row form-group">
                    <label for="authors" class="col-md-4 col-form-label text-md-left">Authors</label>
                    <div class="col-md-6">
                        <select id="authors" multiple class="form-control" name="authors[]">
                            <option disabled selected> Choose Author</option>
                            @foreach($authors as $author)
                                <option value="{{$author->id}}">{{$author->name}}</option>
                            @endforeach
                        </select>
                        @error('authors')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="row form-group">
                    <label for="publishers" class="col-md-4 col-form-label text-md-left">Publishers</label>
                    <div class="col-md-6">
                        <select id="publishers"  class="form-control" name="publishers">
                            <option disabled selected> Choose Publisher</option>
                            @foreach($publishers as $publisher)
                                <option value="{{$publisher->id}}">{{$publisher->name}}</option>
                            @endforeach
                        </select>
                        @error('publishers')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="row form-group">
                    <label for="publish_year" class="col-md-4 col-form-label text-md-left">Publish year</label>
                    <div class="col-md-6">
                        <input name="publish_year"  class="form-control  @error('publish_year') is-invalid @enderror" id="publish_year" type="number" value="{{old('publish_year')}}" autocomplete="publish_year">
                        @error('publish_year')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
                    </div>
                </div>


                <div class="row form-group">
                    <label for="categories" class="col-md-4 col-form-label text-md-left">categories</label>
                    <div class="col-md-6">
                        <select id="categories"  class="form-control" name="categories">
                            <option disabled selected> Choose Category</option>
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                        @error('categories')
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

                <div class="row form-group">
                    <label for="nbr_of_pages" class="col-md-4 col-form-label text-md-left">Number of pages</label>
                    <div class="col-md-6">
                        <input name="nbr_of_pages"  class="form-control  @error('nbr_of_pages') is-invalid @enderror" id="nbr_of_pages" type="number" value="{{old('nbr_of_pages')}}" autocomplete="nbr_of_pages">
                        @error('nbr_of_pages')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
                    </div>
                </div>


                <div class="row form-group">
                    <label for="nbr_of_page" class="col-md-4 col-form-label text-md-left">Number of copies</label>
                    <div class="col-md-6">
                        <input name="nbr_of_copies"  class="form-control  @error('nbr_of_copies') is-invalid @enderror" id="nbr_of_copies" type="number" value="{{old('nbr_of_copies')}}" autocomplete="nbr_of_copies">
                        @error('nbr_of_copies')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
                    </div>
                </div>


                <div class="row form-group">
                    <label for="price" class="col-md-4 col-form-label text-md-left">Price</label>
                    <div class="col-md-6">
                        <input name="price"  class="form-control  @error('price') is-invalid @enderror" id="price" type="number" value="{{old('price')}}" autocomplete="nbr_of_copies">
                        @error('price')
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

@section('script')
    <script>
        function readCoverImage(input){
            if(input.files && input.files[0]){
                var reader = new FileReader();
                reader.onload= function(e){
                    $('#cover-image-thumb')
                        .attr('src',e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
@endsection
