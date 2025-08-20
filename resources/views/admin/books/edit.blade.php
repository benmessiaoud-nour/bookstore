@extends('theme.default')

@section('title')
    Edit Book
@endsection

@section('content')
    <div class="row">
        <div class="card mb-4 col-md-8">
            <div class="card-header">
                Edit Book
            </div>
            <div class="card-body">
                <form action="{{route('books.update',$book)}}" method="POST" enctype="multipart/form-data">
                    @method('patch')
                    @csrf

                    <div class="row form-group">
                        <label for="title" class="col-md-4 col-form-label text-md-left">Book Title</label>
                        <div class="col-md-6">
                            <input name="title" class="form-control @error('title') is-invalid @enderror" id="title" type="text" value="{{$book->title}}" autocomplete="title">
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
                            <input name="ibsn" class="form-control @error('ibsn') is-invalid @enderror" id="ibsn" type="text" value="{{$book->ibsn}}" autocomplete="ibsn">
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
                            <input name="cover_image" accept="image/*" onchange="readCoverImage(this);" class="form-control  @error('cover_image') is-invalid @enderror" id="cover_image" type="file"  autocomplete="cover_image">
                            @error('cover_image')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                            @enderror

                            <img id="cover-image-thumb" class="img-fluid img-thumbnail" src="{{asset('storage/'.$book->cover_image)}}">
                        </div>
                    </div>


                    <div class="row form-group">
                        <label for="authors" class="col-md-4 col-form-label text-md-left">Authors</label>
                        <div class="col-md-6">
                            <select id="authors" multiple class="form-control" name="authors[]">
                                <option disabled {{$book->author()->count() == 0 ? 'selected':''}}> Choose Author</option>
                                @foreach($authors as $author)
                                    <option value="{{$author->id}}" {{$book->author->contains($author) ? 'selected' : ''}}>{{$author->name}}</option>
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
                                <option disabled {{$book->publisher ==null ? 'selected' : ''}}> Choose Publisher</option>
                                @foreach($publishers as $publisher)
                                    <option value="{{$publisher->id}}" {{$book->publisher == $publisher ? 'selected': ''}}>{{$publisher->name}}</option>
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
                            <input name="publish_year"  class="form-control  @error('publish_year') is-invalid @enderror" id="publish_year" type="number" value="{{$book->publish_year}}" autocomplete="publish_year">
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
                                <option disabled {{$book->category == null ?'selected':''}}> Choose Category</option>
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}" {{$book->category == $category ? 'selected' : ''}}>{{$category->name}}</option>
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
                            <textarea name="description"  rows="4" class="form-control   @error('description') is-invalid @enderror" id="description" type="text" autocomplete="description"> {{$book->description}} </textarea>

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
                            <input name="nbr_of_pages"  class="form-control  @error('nbr_of_pages') is-invalid @enderror" id="nbr_of_pages" type="number" value="{{$book->nbr_of_pages}}" autocomplete="nbr_of_pages">
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
                            <input name="nbr_of_copies"  class="form-control  @error('nbr_of_copies') is-invalid @enderror" id="nbr_of_copies" type="number" value="{{$book->nbr_of_copies}}" autocomplete="nbr_of_copies">
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
                            <input name="price"  class="form-control  @error('price') is-invalid @enderror" id="price" type="number" value="{{$book->price}}" autocomplete="nbr_of_copies">
                            @error('price')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-1">
                            <button class="btn btn-primary" type="submit">Edit </button>
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
