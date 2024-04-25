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
            @if (in_array($food['id'],[42,43,44,45]))
                @continue
            @endif
            <div class="item">
                <!-- Нужна будет картинка -->
                <p>{{$food['name']}}</p>
                <p>{{$food['ingridients']}}</p>
                <p>{{$food['cost'] . ' ₽'}}</p>
                <form action="cart/remove" method="post">
                    @csrf
                    <input type="hidden" value={{$food['id']}} name='id'>
                    <button class='minus' type='submit'>-</button>
                </form>
                <p>{{$food['quantity']}}</p>
                <form action="cart/addInto" method='post'>
                    @csrf
                    <input type="hidden" value={{$food['id']}} name='id'>
                    <button class='plus' type='submit'>+</button>
                </form>
            </div>
            @endforeach
        </div>
        <div class="extra">
            <h1>Дополнительно</h1>
            <div class="item"><!-- картинка -->
                <p>Палочки для суши</p>
                <form action="cart/remove" method="post">
                    @csrf
                    <input type="hidden" value=42 name='id'>
                    <button class='minus' type='submit'>-</button>
                </form>
                <p>@php if (isset($cart[42])) echo $cart[42]['quantity']; else echo "0" @endphp </p>
                <form action="cart/addInto" method='post'>
                    @csrf
                    <input type="hidden" value=42 name='id'>
                    <button class='plus' type='submit'>+</button>
                </form>
                <div class="item"><!-- картинка -->
                    <p>Соевый соус</p>
                    <form action="cart/remove" method="post">
                        @csrf
                        <input type="hidden" value=43 name='id'>
                        <button class='minus' type='submit'>-</button>
                    </form>
                    <p>@php if (isset($cart[43])) echo $cart[43]['quantity']; else echo "0" @endphp </p>
                    <form action="cart/addInto" method='post'>
                        @csrf
                        <input type="hidden" value=43 name='id'>
                        <button class='plus' type='submit'>+</button>
                    </form>
                </div>
                <div class="item"><!-- картинка -->

                    <p>Имбирь</p>
                    <form action="cart/remove" method="post">
                        @csrf
                        <input type="hidden" value=44 name='id'>
                        <button class='minus' type='submit'>-</button>
                    </form>
                    <p>@php if (isset($cart[44])) echo $cart[44]['quantity']; else echo "0" @endphp </p>
                    <form action="cart/addInto" method='post'>
                        @csrf
                        <input type="hidden" value=44 name='id'>
                        <button class='plus' type='submit'>+</button>
                    </form>
                </div>
                <div class="item"><!-- картинка -->

                    <p>Васаби</p>
                    <form action="cart/remove" method="post">
                        @csrf
                        <input type="hidden" value=45 name='id'>
                        <button class='minus' type='submit'>-</button>
                    </form>
                    <p>@php if (isset($cart[45])) echo $cart[45]['quantity']; else echo "0" @endphp </p>
                    <form action="cart/addInto" method='post'>
                        @csrf
                        <input type="hidden" value=45 name='id'>
                        <button class='plus' type='submit'>+</button>
                    </form>
                </div>

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
                    <input type="hidden" name='cost' value={{$totalCost}}>
                    <button type='submit'>оформить заказ</button>
                </form>
            </div>
        </div>
        <div class="footer"></div>
</body>

</html>