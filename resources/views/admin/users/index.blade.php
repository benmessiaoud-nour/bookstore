@extends('theme.default')

@section('head')
    <link href="{{asset('theme/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
@endsection

@section('title')
    Categories List
@endsection

@section('content')

    <div class="row">
        <div class="col-md-12 width-100%"></div>
        <table class="table table-hover" id="books-table">
            <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Status</th>
                <th scope="col">Options</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td> {{$user->isSuperAdmin() ? 'super admin' : ($user->isAdmin()? ' admin' : 'user')}}</td>

                   <td>
                       <form class="ms-5 form-inline" method="post" action="{{route('users.update',$user)}}" style="display: inline-block">
                           @method('patch')
                           @csrf
                           <select class="form-control form-control-sm" name="admin_level">
                               <option selected disabled>Choose One</option>
                               <option value="0">User</option>
                               <option value="1">Admin</option>
                               <option value="2">Super Admin</option>
                           </select>

                           <button type="submit" class="btn btn-info btn-sm"> <i class="fa fa-edit"></i>Edit</button>
                       </form>

                       <form method="post" action="{{route('users.destroy',$user)}}" style="display: inline-block">
                           @method('delete')
                           @csrf
                           @if( auth()->user() != $user)
                               <button class="btn btn-danger btn-sm" type="submit" onclick="return confirm('Are You Sure?')"><i class="fa fa-trush"></i>Delete</button>

                           @else
                               <div class="btn btn-danger btn-sm disabled"><i class="fa fa-trush"></i>Delete</div>
                           @endif

                       </form></td>
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
