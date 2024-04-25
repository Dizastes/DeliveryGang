<script>
    let status;
    let select
</script>
<div class="container ">
    @foreach ($items as $order)
        <form action="orders/change" id="form{{ $order['id'] }}" method="post">
            <div class="order-workers container d-flex flex-row">
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
                    <button class="btn" type="button" data-bs-toggle="collapse"
                        data-bs-target="#{{ $order['id'] }}" aria-expanded="false" aria-controls="collapseExample">
                        \/
                    </button>
                </div>
                <div class="row stats">
                    <select class="order-status" name="status" id="test{{ $order['id'] }}">
                        <option value="ожидает модерации">ожидает модерации</option>
                        <option value="в очереди">в очереди</option>
                        <option value="готовится">готовится</option>
                        <option value="ждет курьера">ждет курьера</option>
                        <option value="в доставке">в доставке</option>
                        <option value="получен">получен</option>
                        <option value="отклонен">отклонен</option>
                    </select>
                </div>
            </div>
        </form>
        <script>
            document.querySelector("#test{{ $order['id'] }}").addEventListener('change', function(e) {
                document.querySelector('#form{{ $order['id'] }}').submit();
            })

            status = "{{ $order['status'] }}";
            select = document.querySelector('#test{{ $order['id'] }}');

            for (let i = 0; i < select.childNodes.length; i++) {
                if (select.childNodes[i].value == status) {
                    select.childNodes[i].selected = true;
                    break;
                }
            }
        </script>
    @endforeach
</div>
