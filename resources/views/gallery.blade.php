@extends('layouts.main')

@section('head')

<style>
    .row .title{
        font-size: 2.5rem;
        color: #1F2D3D;
        text-shadow: 0 2px 5px rgba(0,0,0,0.3);
    }
    .card .card-img-top{
        height: 400px;
        overflow: hidden;
    }
    .card .card-body{

       text-align: center;
        justify-content: center;
    }
    .card .card-body .card-title a{
        font-weight: bold;
        color: #1F2D3D;
        text-decoration: none;
    }
    .card .card-body .card-title a:hover{
        color:#4A6A84;

    }

    .card .card-body .card-description{
        color: #2F3E46;
        font-size: 1rem;
        text-decoration: none;
    }

</style>

@endsection

@section('content')
<div class="container pt-5">
    <div class="row">
        <form action="{{route('search')}}" method="get">
        <div class="d-flex justify-content-center">
            <input type="text" class="col-3 mx-sm-3 mb-2" name="term" placeholder="    Search a book">
            <button type="submit" class="col-1 btn btn-secondary bg-secondary mb-2"><i class="fa-solid fa-magnifying-glass"></i></button>
        </div>
        </form>
    </div>
    <hr>
    <div class="row">
        <h3 class="title py-3">{{$title }}</h3>

    </div>
        <div class="row my-4">

            @if($books->Count())
                @foreach($books as $book)
                    @if($book->nbr_of_copies>0)
            <div class="col-lg-3 col-md-4 col-sm-6 mt-2">
                <div class="card mb-5" style="width: 18rem;">
                    <img src="{{asset('storage/'.$book->cover_image)}}" class="card-img-top" alt="">
                    <div class="card-body">
                        <h6 class="card-title"><a class=" mb-0" href="#">{{$book->title}}</a></h6>
                        <a class=" card-description" href="#">
                            @if($book->category!=NULL)
                                {{$book->category->name}}
                            @endif
                        </a>
                       <h3 class="mb-0 font-weight-semibold">{{$book->price}}</h3>
                        <div><i class="fa-solid fa-star"></i></div>

                    </div>
                </div>

            </div>
                    @endif
                @endforeach

            @else
                <div class="alert alert-info" role="alert">
                    No Results!
                </div>
            @endif

                {{ $books->links()}}
        </div>

</div>



@endsection

@section('script')
@endsection

