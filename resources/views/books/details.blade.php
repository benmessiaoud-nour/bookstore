@extends('layouts.main')



@section('head')
    <style>
        .row .headline h3{
            font-size: 2rem;
            color: #1F2D3D;
            text-shadow: 0 2px 5px rgba(0,0,0,0.3);
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
                <h4> Ratings</h4>

                <div>
                            <span class="score">
                                <div class="score-wrap">
                                    <span class="stars-active" style="width:{{$book->rate()*20}}%">
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                    </span>

                                              <span class="stars-inactive">
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                    </span>
                                </div>
                            </span>

                    <span>Rated By {{$book->ratings()->count()}} User</span>
                </div>

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

                @auth()

                    <h4 class="mb-3">Rate This Book</h4>
                    @if(auth()->user()->rated($book))
                        <div class="rating">
                            <span class="rating-star {{auth()->user()->bookRating($book)->value ==5 ? 'checked' : '' }}" data-value="5"></span>
                            <span class="rating-star {{auth()->user()->bookRating($book)->value ==4 ? 'checked' : '' }}" data-value="4"></span>
                            <span class="rating-star {{auth()->user()->bookRating($book)->value ==3 ? 'checked' : '' }}" data-value="3"></span>
                            <span class="rating-star {{auth()->user()->bookRating($book)->value ==2 ? 'checked' : '' }}" data-value="2"></span>
                            <span class="rating-star {{auth()->user()->bookRating($book)->value ==1 ? 'checked' : '' }}" data-value="1"></span>

                        </div>
                    @else
                        <div class="rating">
                            <span class="rating-star" data-value="5"></span>
                            <span class="rating-star" data-value="4"></span>
                            <span class="rating-star" data-value="3"></span>
                            <span class="rating-star" data-value="2"></span>
                            <span class="rating-star" data-value="1"></span>

                        </div>


                    @endif
                @endauth


            </div>
        </div>
    </div>
@endsection


@section('script')
    <script>
        $('.rating-star').click(function(){
            let value = $(this).data('value');   // ✅ get the star’s value (1–5)

            $.ajax({
                type: 'post',
                url: '/books/{{ $book->id }}/rate',   // ✅ safer URL format
                data:{
                    '_token': $('meta[name="csrf-token"]').attr('content'),
                    'value': value
                },
                success: function (){
                    location.reload(); // refresh page to show updated rating
                },
                error: function (){
                    alert('Something went wrong');
                },
            });
        });
    </script>
@endsection
