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
<h1>Авторизация</h1>

<form action="{{route('login_form')}}" method="POST">
    @csrf
    <input name="email" type="email">
    <input name="password" type="password">
    <button type="submit">Войти</button>
</form>
</body>
</html>
