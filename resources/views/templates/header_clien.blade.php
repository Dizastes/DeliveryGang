<header class="header-client">
    <div class="container d-flex flex-row">
        <a href="/"><img src="{{ asset('images/logo.png') }}" class="logo row"></a>
        <div class="rest-name row container">
            <h3 class="col" style="color:#f9a8c8">Delivery Gang</h3>
            <h5 class="col">Asian Сuisine</h5>
        </div>
    </div>
    <div class="container d-flex flex-row icons-group">
        @if ($user['role'] != '0')
            <a href="/orders"><img class="row" src="{{ asset('images/order.png') }}"></a>
        @endif
        <a href="/cart"><img class="row" src="{{ asset('images/shoper.png') }}"></a>
        <a href="/lk"><img class="row user-icon" src="{{ asset('images/icon.png') }}"></a>
        <a href="/logout"><img class="row" src="{{ asset('images/logout.png') }}"></a>
    </div>
</header>
