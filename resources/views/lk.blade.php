<!DOCTYPE html>
<html lang="en">

<head>
    @include('templates.include')
    <title>Document</title>
    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
</head>

<body>

    @include('templates.header_clien')

    <main>
        <div class="client-information">
            <div class="name">
                <p>Имя:</p>
                <p>{{ $user['name'] }}</p>
            </div>
            <div class="phone">
                <p>Телефон:</p>
                <p>{{ $user['number'] }}</p>
            </div>
            <div class="mail">
                <p>E-mail:</p>
                <p>{{ $user['email'] }}</p>
            </div>
            <div class="date">
                <p>Дата рождения:</p>
                <p>{{ $user['birth'] }}</p>
            </div>
        </div>
        <div class="orders-client">
            <h1>История заказов</h1>
            @foreach ($orders as $order)
                <div class="order-history">
                    <div class="head">
                        <p>Заказ №{{ $order['id'] }} от {{ $order['date'] }}</p>
                        <button class="btn" type="button" data-bs-toggle="collapse"
                            data-bs-target="#{{ $order['id'] }}" aria-expanded="false" aria-controls="collapseExample">
                            \/
                        </button>
                        <p class="order-status">{{ $order['status'] }}</p>
                    </div>
                    <div class="collapse" id="{{ $order['id'] }}">
                        <div class="card card-body order-details">
                            @foreach ($order['foods'] as $food)
                                <p>{{ $food }}</p>
                            @endforeach
                        </div>
                    </div>
                    <p class="total-price">{{ $order['cost'] . ' ₽' }} </p>
                </div>
                <hr>
            @endforeach
        </div>
        </div>
    </main>
    @include('templates.footer')
    <script>
        var pusher = new Pusher('e4af738018f4c430d7fb', {
            cluster: 'eu'
        });

        var channel = pusher.subscribe('order-accepted-channel');
        channel.bind('App\\Events\\OrderAccepted', function(data) {
            // Здесь вы можете обработать данные, переданные событием
            // console.log('Received data:', data);
            window.location.reload();
        });
    </script>
</body>

</html>
