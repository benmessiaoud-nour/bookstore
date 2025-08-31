@extends('theme.default')

@section('head')
    <link href="{{asset('theme/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
@endsection

@section('title')
    Categories List
@endsection

@section('content')
    <a class="btn btn-primary" href="{{route('categories.create')}}"><i class="fas fa-plus"></i>Add New Category</a>
    <hr>
    <div class="row">
        <div class="col-md-12 width-100%"></div>
        <table class="table table-hover" id="books-table">
            <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Description</th>
                <th scope="col">Options</th>
            </tr>
            </thead>
            <tbody>
            @foreach($categories as $category)
                <tr>
                    <td ><a>{{$category->name}}</a></td>
                    <td>{{$category->description}}</td>
                    <td>
                        <a class="btn btn-btn-primary btn-sm" href="{{route('categories.edit',$category)}}"><i class="fa fa-edit"></i>Edit</a>
                        <form method="post" action="{{route('categories.destroy',$category)}}" class="d-inline-block">
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
