<!DOCTYPE html>
<html lang="en">

<head>
    @include('templates.include')
    <title>Document</title>
</head>

<body>

    @include('templates.header_clien')

    <main>
        <div class="client-information">
            <div class="name">
                <p>Имя:</p>
                <p>{{$user['name']}}</p>
            </div>
            <div class="phone">
                <p>Телефон:</p>
                <p>+79281255555</p>
            </div>
            <div class="mail">
                <p>E-mail:</p>
                <p>{{$user['email']}}</p>
            </div>
            <div class="date">
                <p>Дата рождения:</p>
                <p>12.08.2004</p>
            </div>
        </div>
        <div class="orders-client">
            <h1>История заказов</h1>
            @foreach ($orders as $order)
            <div class="order-history">
                <div class="head"><p>Заказ №{{$order['id']}} от {{$order['date']}}</p> <button class="btn" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                    \/
                  </button><p class="order-status">{{$order['status']}}</p> </div>
                    <div class="collapse" id="collapseExample">
                        <div class="card card-body order-details">
                            @foreach($order['foods'] as $food) 
                            <p>{{$food}}</p>
                            @endforeach
                        </div>
                    </div>
                    <p class="total-price">{{$order['cost'] . ' ₽'}} </p>
                </div>
                <hr>
            </div>
            @endforeach
        </div>
    </main>
    @include('templates.footer')
</body>

</html>