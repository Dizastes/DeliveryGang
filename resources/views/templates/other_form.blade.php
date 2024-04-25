@foreach ($items as $order)
    <form action="orders/next" id="form" method="post" class="orders-form">
        <div class="order-workers">
            <div class="decor-elem"></div>
            @csrf
            <input type="hidden" value="{{ $order['id'] }}" name="id">
            <div class="row d-flex flex-row">
                <div class="row order-info-details">
                    <h4>Заказ №{{ $order['id'] }} к {{ $order['time'] }}</h4>
                    <p>Стойиость: {{ $order['cost'] }} Р</p>
                    <p>Номер: {{ $order['number'] }}</p>
                    <p>Аддрес: {{ $order['address'] }}</p>
                    <div class="collapse" id="{{ $order['id'] }}">
                        <div class="card card-body order-details">
                            @foreach ($order['foods'] as $food)
                                <p>{{ $food }}</p>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="row order-info-details">
                <p>Комментарий: {{ $order['comment'] }}</p>
            </div>
            <div class="row">
                <button class="btn" type="button" data-bs-toggle="collapse" data-bs-target="#{{ $order['id'] }}"
                    aria-expanded="false" aria-controls="collapseExample">
                    \/
                </button>
            </div>
            <div class="row accepted-btn">
                <input type="submit" value="{{ $order['status'] }}" name="status_button" class="order-status">
            </div>
        </div>
    </form>
@endforeach
