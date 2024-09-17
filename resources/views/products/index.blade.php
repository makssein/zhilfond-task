<!DOCTYPE html>
<html>
<head>

</head>
<body>
    <h1>Каталог</h1>

    @foreach($products as $product)
        <div>
            <h3>{{$product->name}}</h3>
            <p>Цена: {{$product->price}}</p>

            <form action="{{route('cart.addToCart', $product->id)}}" method="POST">
                @csrf
                <input type="number" min="1" value="1">
                <button type="submit">Добавить в корзину</button>
            </form>
        </div>
    @endforeach
</body>
</html>
