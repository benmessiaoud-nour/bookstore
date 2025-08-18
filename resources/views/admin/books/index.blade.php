@extends('theme.default')

@section('head')
    <link href="{{asset('theme/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
@endsection

@section('title')
    Books Details
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12 width-100%"></div>
        <table class="table table-hover" id="books-table">
            <thead>
            <tr>
                <th scope="col">Book Title</th>
                <th scope="col">Isbn</th>
                <th scope="col">Category</th>
                <th scope="col">Author</th>
                <th scope="col">Publishers</th>
                <th scope="col">Price</th>
            </tr>
            </thead>
            <tbody>
            @foreach($books as $book)
            <tr>
                <td ><a href="#">{{$book->title}}</a></td>
                <td>{{$book->ibsn}}</td>
                <td>
                   {{$book->category !=null ? $book->category->name : ''}}
                </td>

                <td>
                    @if($book->author()->count()>0)
                        @foreach($book->author as $author) @endforeach

                        {{ $author->name}}
                    @endif
                </td>

                <td>
                    {{$book->publisher !=null ? $book->publisher->name : ''}}
                </td>

                <td>
                    {{$book->price}} $
                </td>
            </tr>


            @endforeach
            </tbody>
        </table>
    </div>



@endsection

@section('script')
    <script src="{{asset('theme/vendor/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('theme/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
   <script>
       $(document).ready(function()
       {
           $('#books-table').DataTable({
           });
       });
   </script>

@endsection
