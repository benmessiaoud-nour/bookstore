@extends('layouts.main')




@section('head')
    <style>
        .card .card-header{
            font-size: 18px;
            color: #1F2D3D;
        }
        .card .list-group a{
            text-decoration: none;
        }
        .card .list-group a:hover{
            color:#4A6A84;
        }
    </style>
@endsection
@section('content')

    <div class="container mt-4">

        <div class="row mt-5 pt-5">
            <form action="{{route('gallery.publishers.search')}}" method="get">
                <div class=" d-flex justify-content-center">
                    <input type="text" class="  col-3 mx-sm-3 mb-2" name="term" placeholder="    Search a publisher">
                    <button type="submit" class=" col-1 btn btn-secondary bg-secondary mb-2"><i class="fa-solid fa-magnifying-glass"></i></button>
                </div>
            </form>
        </div>
        <div class="row mt-4 justify-content-center">
            <div class="col-md-6">
                <div class="card" style="width: 40rem;">
                    <div class="card-header">
                        {{$title}}
                    </div>
                    <ul class="list-group list-group-flush">
                        @if($publishers->count())

                            @foreach($publishers as $publisher)
                                <a href="{{route('gallery.publishers.show',$publisher)}}">

                                    <li class="list-group-item">{{$publisher->name}} ({{$publisher->books->count()}})</li>
                                </a>

                            @endforeach
                        @else
                            <div class="alert alert-danger" role="alert">
                                No Results
                            </div>
                        @endif
                    </ul>




                </div>
            </div>
        </div>

    </div>



@endsection
