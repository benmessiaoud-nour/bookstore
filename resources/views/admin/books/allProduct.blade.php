@extends('theme.default')

@section('head')
    <link href="{{asset('theme/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
@endsection

@section('title')
    All Products
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12 width-100%"></div>
        <table class="table table-hover" id="books-table">
            <thead>
            <tr>
                <th scope="col">Client</th>
                <th scope="col">Title</th>
                <th scope="col">Number Of Copies</th>
                <th scope="col">Price</th>
                <th scope="col">Total Price</th>
                <th scope="col">Bought Date</th>

            </tr>
            </thead>
            <tbody>
            @foreach($allBooks as $product)
                <tr>
                    <td>
                        {{$product->user::find($product->user_id)->name}}
                    </td>

                    <td ><a href="{{route('books.show',$product->book_id)}}">{{$product->book::find($product->book_id)->title}}</a></td>

                    <td>
                        {{$product->nbr_of_copies}}
                    </td>

                    <td>
                        {{$product->price}} $
                    </td>

                    <td>
                        {{$product->price * $product->nbr_of_copies}} $
                    </td>

                    <td>
                        {{$product->created_at}}
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
