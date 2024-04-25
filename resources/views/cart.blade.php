<!DOCTYPE html>
<html lang="en">

<head>
    @include('templates.include')
    <title>DeliveryGang</title>
</head>

<body>
    @include('templates.header_clien')
    <style>
        :root {
            --worker-color: #f9a8c8;
        }
    </style>
    <main>
        <div class="main_block">
            <div class="container d-flex flex-row align-items-center">
                <h1>Корзина</h1>
                <div class="line_block">
                    <div class="order_line"></div>
                </div>
            </div>
            <div class="cart">
                @foreach ($foods as $food)
                    @if (in_array($food['id'], [42, 43, 44, 45]))
                        @continue
                    @endif
                    <div class="item cartes">
                        <img src="{{ $food['photo'] }}">
                        <div>
                            <h1>{{ $food['name'] }}</h1>
                            <h5>{{ $food['ingridients'] }}</h5>
                        </div>
                        <div class="container d-flex flex-row justify-content-center minus-to-plus">
                            <form action="cart/remove" method="post">
                                @csrf
                                <input type="hidden" value={{ $food['id'] }} name='id'>
                                <button class='minus' type='submit'>-</button>
                            </form>
                            <h5>{{ $food['quantity'] }}</h5>
                            <form action="cart/addInto" method='post'>
                                @csrf
                                <input type="hidden" value={{ $food['id'] }} name='id'>
                                <button class='plus' type='submit'>+</button>
                            </form>
                        </div>
                        <div>
                            <h2>{{ $food['cost'] . ' ₽' }}</h2>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="container d-flex flex-row align-items-center">
                <h1>Дополнительно</h1>
                <div class="line_block">
                    <div class="order_line"></div>
                </div>
            </div>
            <div class="extra">
                <div class="item additionally">
                    <h5>Палочки для суши</h5>
                    <img src="{{ asset('images/палочки для суши.png') }}">
                    <div class="add-to-remove">
                        <form action="cart/remove" method="post">
                            @csrf
                            <input type="hidden" value=42 name='id'>
                            <button class='minus' type='submit'>-</button>
                        </form>
                        <p>@php
                            if (isset($cart[42])) {
                                echo $cart[42]['quantity'];
                            } else {
                                echo '0';
                            }
                        @endphp </p>
                        <form action="cart/addInto" method='post'>
                            @csrf
                            <input type="hidden" value=42 name='id'>
                            <button class='plus' type='submit'>+</button>
                        </form>
                    </div>
                </div>
                <div class="item additionally"><!-- картинка -->
                    <h5>Соевый соус</h5>
                    <img src="{{ asset('images/соевый соус.png') }}">
                    <div class="add-to-remove">
                        <form action="cart/remove" method="post">
                            @csrf
                            <input type="hidden" value=43 name='id'>
                            <button class='minus' type='submit'>-</button>
                        </form>
                        <p>@php
                            if (isset($cart[43])) {
                                echo $cart[43]['quantity'];
                            } else {
                                echo '0';
                            }
                        @endphp </p>
                        <form action="cart/addInto" method='post'>
                            @csrf
                            <input type="hidden" value=43 name='id'>
                            <button class='plus' type='submit'>+</button>
                        </form>
                    </div>
                </div>
                <div class="item additionally"><!-- картинка -->
                    <h5>Имбирь</h5>
                    <img src="{{ asset('images/имбирь.png') }}">
                    <div class="add-to-remove">
                        <form action="cart/remove" method="post">
                            @csrf
                            <input type="hidden" value=44 name='id'>
                            <button class='minus' type='submit'>-</button>
                        </form>
                        <p>@php
                            if (isset($cart[44])) {
                                echo $cart[44]['quantity'];
                            } else {
                                echo '0';
                            }
                        @endphp </p>
                        <form action="cart/addInto" method='post'>
                            @csrf
                            <input type="hidden" value=44 name='id'>
                            <button class='plus' type='submit'>+</button>
                        </form>
                    </div>
                </div>
                <div class="item additionally">
                    <h5>Васаби</h5>
                    <img src="{{ asset('images/васаби.png') }}">
                    <div class="add-to-remove">
                        <form action="cart/remove" method="post">
                            @csrf
                            <input type="hidden" value=45 name='id'>
                            <button class='minus' type='submit'>-</button>
                        </form>
                        <p>@php
                            if (isset($cart[45])) {
                                echo $cart[45]['quantity'];
                            } else {
                                echo '0';
                            }
                        @endphp </p>
                        <form action="cart/addInto" method='post'>
                            @csrf
                            <input type="hidden" value=45 name='id'>
                            <button class='plus' type='submit'>+</button>
                        </form>
                    </div>
                </div>
            </div>
            <p class="total-summ">{{ 'Сумма заказа: ' . $totalCost . ' ₽' }}</p>
        </div>
        <div class="form">
            <div class="container d-flex flex-row align-items-center">
                <h1>Адресс:</h1>
                <div class="line_block">
                    <div class="order_line"></div>
                </div>
            </div>
            <form action="cart/addorder" method='post'>
                <div class="address-form">
                    @csrf
                    <div class="container d-flex flex-column align-items-left">
                        <label for="">Улица</label>
                        <input type="text" name='street'>
                    </div>
                    <div class="container d-flex flex-column align-items-left">
                        <label for="">Дом</label>
                        <input type="text" name='houseNum'>
                    </div>
                    <div class="container d-flex flex-column align-items-left">
                        <label for="">Подъезд</label>
                        <input type="text" name='entrance'>
                    </div>
                    <div class="container d-flex flex-column align-items-left">
                        <label for="">Квартира</label>
                        <input type="text" name='apartment'>
                    </div>
                    <div class="container d-flex flex-column align-items-left comment-to-order">
                        <label for="">Комментарий к заказу</label>
                        <input type="text" name='comment'>
                    </div>
                    <div class="container d-flex flex-row time-to-delivery">
                        <label for="">Время доставки</label>
                        <input type="time" name='time'>
                    </div>
                    <input type="hidden" name='cost' value={{ $totalCost }}>
                    <button type='submit' class="order-status"
                        style="background-color: var(--worker-color)">оформить заказ</button>
                </div>
            </form>
        </div>
    </main>
    @include('templates.footer')
</body>

</html>
