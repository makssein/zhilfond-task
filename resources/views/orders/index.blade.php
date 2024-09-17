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
<h1>Заказы</h1>

<ul>
    @foreach($orders as $order)
        <li>
            <div>
                Заказ {{$order->id}}, дата заказа {{$order->created_at}} <br>
                Товары: {{$order->products->pluck('name')->implode(', ')}} <br>
                Общая сумма: {{$order->price_total}}
            </div>
            <form action="{{route('orders.delete', $order->id)}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">Удалить</button>
            </form>
        </li>
    @endforeach
</ul>

<h4>Сумма всех заказов: {{$price_total}}</h4>

</body>
</html>
