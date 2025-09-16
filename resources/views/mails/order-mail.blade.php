<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mail</title>
</head>
<body>
<P>Hello{{$user->name}}</P>
<P>We Recieved Your Order Successfully</P>
<br>

<table style="width:600px;">
    <thead>
    <tr>
        <th>Book Title</th>
        <th>Price</th>
        <th>Number Of Copies</th>
        <th>Total Price</th>
    </tr>
    </thead>
    <tbody>
@php
$subTotal=0
@endphp
    @foreach($order as $product)
        <tr>
            <td>{{$product->title}}</td>
            <td>{{$product->price}}$</td>
            <td>{{$product->pivot->nbr_of_copies}}</td>
            <td>{{$product->price * $product->pivot->nbr_of_copies}}$</td>


            @php
            $subTotal +=$product->pivot->nbr_of_copies
            @endphp
        </tr>
    @endforeach
    <br>
    <tr>
        <td colspan="3" style="border-top:1px solid #ccc;"></td>
        <td style="font-size: 15px;font-weight: bold;border-top: 1px solid #ccc;">Total:{{$subTotal}}$</td>
    </tr>
    </tbody>
</table>
</body>
</html>
