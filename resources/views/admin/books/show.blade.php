@extends('theme.default')
@section('title')
    Show Book Details
@endsection

@section('head')
    <style>
table{
    table-layout:fixed ;
}
table tr th{
width: 30%;
}
    </style>
@endsection

@section('content')

    <div class="container">
        <div class="row pt-3">
            <div class="headline col-12 mt-5 pt-5">
                <h3 >Book Details</h3>
            </div>
        </div>

        <div class="row pt-3">
            <!-- Book Image -->
            <div class="col-12 col-md-4 me-5">
                <div class="card">
                    <img class="img-fluid" src="{{ asset('storage/'.$book->cover_image) }}" alt="Book cover">
                </div>
            </div>

            <!-- Book Details -->
            <div class="col-12 col-md-6 ms-5">
                <h4>{{ $book->title }}</h4>
                <p>
                    By  <b>
                        @if($book->author()->count() > 0)
                            @foreach($book->author as $author)
                                {{ $loop->first ? '' : ', ' }}{{ $author->name }}
                            @endforeach
                        @endif
                    </b>

                </p>
                <hr>

                @if($book->category)
                    <h5><b>Category:</b> {{ $book->category->name }}</h5>
                @endif

                <hr>

                @if($book->description)
                    <p>{{ $book->description }}</p>
                @endif

                <hr>

                <div>
                    <h4>Details</h4>

                    <p><b>Isbn:</b>
                        @if($book->ibsn)
                            {{ $book->ibsn }}
                        @endif
                    </p>

                    <p><b>Number Of Pages:</b>
                        @if($book->nbr_of_pages)
                            {{ $book->nbr_of_pages }}
                        @endif
                    </p>

                    <p><b>Number Of Copies:</b>
                        @if($book->nbr_of_copies)
                            {{ $book->nbr_of_copies }}
                        @endif
                    </p>

                    <p><b>Publisher:</b>
                        @if($book->publisher && $book->publisher->name)
                            {{ $book->publisher->name }}
                        @endif
                    </p>

                    <p><b>Publish Year:</b>
                        @if($book->publish_year)
                            {{ $book->publish_year }}
                        @endif
                    </p>

                    <p><b>Price:</b>
                        @if($book->price)
                            {{ $book->price }}
                        @endif
                    </p>
                </div>
                <hr>
                <a class="btn btn-btn-primary btn-sm" href="{{route('books.edit',$book)}}"><i class="fa fa-edit"></i>Edit</a>
                <form method="post" action="{{route('books.destroy',$book)}}" class="d-inline-block">
                    @method('delete')
                    @csrf
                    <button class="btn btn-danger btn-sm" type="submit" onclick="return confirm('Are You Sure?')"><i class="fa fa-trush"></i>Delete</button>
                </form>
            </div>
        </div>
    </div>

@endsection
