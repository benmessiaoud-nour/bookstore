@extends('layouts.main')

@section('content')

<div class="container">
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


                @else
                    <div class="alert alert-info text-center">Books In Your Cart</div>

                @endif
            </div>
        </div>

    </div>
    </div>

