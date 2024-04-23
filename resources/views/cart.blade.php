<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DeliveryGang</title>
</head>

<body>
    <div class="header"></div>
    <div class="main_block">
        <h1>Корзина</h1>
        <div class="cart">
            @foreach($foods as $food)
            <div class="item">
                <!-- Нужна будет картинка -->
                <p>{{$food['name']}}</p>
                <p>{{$food['ingridients']}}</p>
                <p>{{$food['quantity']}}</p>
                <p>{{$food['cost'] . ' ₽'}}</p>
            </div>
            @endforeach
        </div>
        <div class="extra">
            <h1>Дополнительно</h1>
            <!-- Нужно доделать -->
            <p>{{'Сумма заказа: ' . $totalCost . ' ₽'}}</p>
        </div>
        <div class="form">
            <h1>Адресс доставки:</h1>
            <form action="cart/addorder" method='post'>
                @csrf
                <label for="">Улица</label>
                <input type="text" name='street'>
                <label for="">Дом</label>
                <input type="text" name='houseNum'>
                <label for="">Подъезд</label>
                <input type="text" name='entrance'>
                <label for="">Квартира</label>
                <input type="text" name='apartment'>
                <label for="">Комментарий к заказу</label>
                <input type="text" name='comment'>
                <label for="">Время доставки</label>
                <input type="text" name='time'>
                <input type="hidden" name='cost' value = {{$totalCost}}>
                <button type='submit'>оформить заказ</button>
            </form>
        </div>
    </div>
    <div class="footer"></div>
</body>

</html>