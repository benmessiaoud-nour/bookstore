@extends('theme.default')

@section('head')
    <link href="{{asset('theme/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
@endsection

@section('title')
    Books List
@endsection

@section('content')
    <a class="btn btn-primary" href="{{route('books.create')}}"><i class="fas fa-plus"></i>Add New Book</a>
    <hr>
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
                <th scope="col">Options</th>
            </tr>
            </thead>
            <tbody>
            @foreach($books as $book)
            <tr>
                <td ><a href="{{route('books.show',$book)}}">{{$book->title}}</a></td>
                <td>{{$book->ibsn}}</td>
                <td>
                   {{$book->category !=null ? $book->category->name : ''}}
                </td>

                <td>
                    @if($book->author()->count()>0)
                        @foreach($book->author as $author)
                            {{ $author->name}}
                        @endforeach


                    @endif
                </td>

                <td>
                    {{$book->publisher !=null ? $book->publisher->name : ''}}
                </td>

                <td>
                    {{$book->price}} $
                </td>

                <td>
                   <a class="btn btn-btn-primary btn-sm" href="{{route('books.edit',$book)}}"><i class="fa fa-edit"></i>Edit</a>
                    <form method="post" action="{{route('books.destroy',$book)}}" class="d-inline-block">
                        @method('delete')
                        @csrf
                        <button class="btn btn-danger btn-sm" type="submit" onclick="return confirm('Are You Sure?')"><i class="fa fa-trush"></i>Delete</button>
                    </form>
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
