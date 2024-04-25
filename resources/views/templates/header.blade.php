<div class="header_area">
    <div class="header_block">
        <div class="logo_area">
            <a href="/">
                <img src="{{ asset('images/logo.png') }}" class="order_logo">
            </a>
        </div>
        <div class="name_area">
            <div class="name_position">
                <div class="titile">
                    <h3>Delivery Gang</h3>
                </div>
                <div class="subtitle">
                    @if ($role == '1')
                        <style>
                            :root {
                                --worker-color: #15E111;
                            }
                        </style>
                        <p>courier</p>
                    @elseif($role == '2')
                        <style>
                            :root {
                                --worker-color: #7FE8FF;
                            }
                        </style>
                        <p>kitchen</p>
                    @else
                        <style>
                            :root {
                                --worker-color: #FF6456;
                            }
                        </style>
                        <p>manager</p>
                    @endif
                </div>
            </div>
        </div>
        <div class="button_area">
            <div class="profile_button">
                <a href="/lk">
                    <img src="{{ asset('images/human.png') }}" class="profile_img">
                </a>
            </div>
        </div>
    </div>
    <div class="order_line_block">
        <div class="text">Заказы</div>
        <div class="line_block">
            <div class="order_line"></div>
        </div>
    </div>
</div>
