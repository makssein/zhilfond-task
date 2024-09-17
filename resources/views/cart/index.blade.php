<!DOCTYPE html>
<html>
<head>

</head>
<body>
@if(session('success'))
    <p>{{session('success')}}</p>
@endif

@if(session('error'))
    <p>{{session('error')}}</p>
@endif
<h1>Корзина</h1>

@if($cart)
    <ul>
        @foreach($cart as $product)
            <li>{{$product['name']}}: {{$product['quantity']}} x {{$product['price']}}</li>
        @endforeach
    </ul>
    <h4>Итого: {{$price_total}}</h4>

    <form action="{{route('cart.checkout')}}" method="POST">
        @csrf
        <button type="submit">Оформить заказ</button>
    </form>
 @else
    <h4>В корзине ничего нет.</h4>
@endif
</body>
</html>
