<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <div class="main">
        <div class="info">
            <div class="name">
                <p>Имя</p>
                <p>{{$user['name']}}</p>
            </div>
            <div class="phone">
                <p>Телефон</p>

            </div>
            <div class="mail">
                <p>E-mail</p>
                <p>{{$user['email']}}</p>
            </div>
            <div class="date">
                <p>Дата рождения</p>

            </div>
        </div>
        <div class="orders">
            <h1>История заказов</h1>
            @foreach ($orders as $order)
            <p>Заказ №{{$order['id']}} от {{$order['date']}}</p>
            @foreach($order['foods'] as $food) 
            <p>{{$food}}</p>
            @endforeach
            <p>{{$order['cost'] . ' ₽'}} </p> 
            <p>{{$order['status']}}</p> 
            <br>
            @endforeach
        </div>
    </div>

</body>

</html>