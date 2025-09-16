@extends('layouts.main')

@section('content')

<div class="container">
   <div class="row justify-content-center">
       <div id="success" style="display:none" class="col-md-8 text-center h5 p-4 bg-success text-light-rounded">Bought Successfully</div>
       @if(session('message'))
           <div  style="display:none" class="col-md-8 text-center h5 p-4 bg-success text-light-rounded">Bought Successfully</div>
       @endif
       <div class="col-md-12">
           <div class="card mt-6">
               <div class="card-header">
                   Shopping Cart
               </div>
               <div class="card-body">
                   @if($items->count())
                       <table class="table ">
                           <thead class="thead-light">
                           <tr>
                               <th scope="col">Title</th>
                               <th scope="col">Quantity</th>
                               <th scope="col">Price</th>
                               <th scope="col">Total Price</th>
                               <th scope="col"></th>
                           </tr>
                           </thead>

                           @php($totalPrice =0)
                           @foreach($items as $item)
                               @php($totalPrice += $item->price * $item->pivot->nbr_of_copies)


                               <tbody>
                               <tr>
                                   <th scope="row">{{$item->title}}</th>
                                   <td>{{$item->pivot->nbr_of_copies}}</td>
                                   <td>{{$item->price}} $</td>
                                   <td>{{$item->price* $item->pivot->nbr_of_copies}} $</td>
                                   <td>
                                       <form style="float: left;margin: auto 5px" method="post" action="{{route('cart.remove_all',$item->id)}}">
                                           @csrf
                                           <button class="btn btn-outline-danger btn-sm" type="submit">Delete All</button>

                                       </form>

                                       <form style="float: left;margin: auto 5px" method="post" action="{{route('cart.remove_one',$item->id)}}">
                                           @csrf
                                           <button class="btn btn-outline-warning btn-sm" type="submit">Delete One</button>

                                       </form>
                                   </td>

                               </tr>
                               </tbody>
                           @endforeach

                       </table>

                       <h4 class="mb-5">Total Price: {{$totalPrice}}$</h4>

                       <div class="d-inline-block" id="paypal-button-container"></div>

                       <a href="{{route('credit.checkout')}}" class="d-inline-block float-end mb-4 btn btn-primary" style="text-decoration: none">
                       <span>Credit Cart Payment</span>
                           <i class="fas fa-credit-card"></i>
                       </a>

                   @else
                       <div class="alert alert-info text-center">No Books In Your Cart</div>

                   @endif


               </div>
           </div>

       </div>
   </div>
    </div>

@endsection

@section('script')
    <script src="https://www.paypal.com/sdk/js?client-id=AbvEpAHX6N2lmIO28JhkwDR7Gunc_bCTL3LxlwmORBTEw9r_3lmZFRbpZgUoizSCO58XehBP-Q5Bg-sC&currency=USD"></script>



    <script>
        paypal.Buttons({
            createOrder: (data , actions)=> {
              return fetch('/api/paypal/create-payment',{
                  method: 'POST' ,
                  headers: {
                      'Content-Type': 'application/json',
                      'Accept': 'application/json'
                  },
                  body:JSON.stringify({
                      'userId':"{{auth()->user()->id}}",
                  })
              }).then(function(res){
                  return res.json();
              }).then(function(orderData){
                  return orderData.id;
              });
            },
            onApprove: (data, actions) => {
               return fetch('/api/paypal/execute-payment',{
                   method:'POST',
                   headers: {
                       'Content-Type': 'application/json',
                       'Accept': 'application/json'
                   },
                   body:JSON.stringify({
                       orderId:data.orderID,
                       userId:"{{auth()->user()->id}}",
                   })
               }).then(function(res){
                   return res.json();
               }).then(function(orderData){
                $('#success').slideDown(200);
                $('.card-body').slideUp(0);
               });
            }
        }).render('#paypal-button-container');
    </script>

@endsection






