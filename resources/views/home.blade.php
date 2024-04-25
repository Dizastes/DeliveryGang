<!DOCTYPE html>
<html lang="en">

<head>
    @include('templates.include')
    <title>DeliveryGang</title>
</head>

<body>
    <header>
        <header class="header-client">
            <div class="container d-flex flex-row">
                <a href="/"><img src="{{ asset('images/logo.png') }}" class="logo row"></a>
                <div class="rest-name row container">
                    <h3 class="col" style="color:#f9a8c8">Delivery Gang</h3>
                    <h5 class="col">Asian Сuisine</h5>
                </div>
            </div>
            <div class="container d-flex flex-row icons-group">
                @if (isset($role))
                    <input type=text class="search-input" placeholder="поиск">
                    @if ($role == '3')
                        <div>
                            <form action="/NewFood" method='post'>
                                @csrf
                                <button class="order-status" type='submit' data-bs-target="#modal-window">добавить
                                    новое блюдо</button>
                            </form>
                        </div>
                    @endif
                    @if ($role != '0')
                        <a href="/orders"><img class="row" src="{{ asset('images/order.png') }}"></a>
                    @endif
                    <a href="/cart"><img class="row" src="{{ asset('images/shoper.png') }}"></a>
                    <a href="/lk"><img class="row user-icon" src="{{ asset('images/icon.png') }}"></a>
                @else
                    <a href="/login" class="order-status"
                        style="text-decoration:none; background-color: #FF6456">Войти</a>
                @endif
            </div>
        </header>
    </header>
    <main>
        <nav class="navigation-menu">
            <div class="navigation-menu">
                @foreach ($foods as $category => $food)
                    <a href="#{{ $category }}">{{ $category }}</a>
                @endforeach
            </div>
        </nav>
        <div class="adv"> <img src="{{ asset('images/банер 3.png') }}"></img></div>
        <div class="main_block"> <!-- основной блок с товарами -->

            @if ($role == 3 and isset($modal))

                <div class="modal fade" id="modal-window" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Добавление новой позиции</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Закрыть"></button>
                            </div>
                            <div class="modal-body">
                                <h1>!!!СНАЧАЛА ДОБАВЛЯТЬ ИНГРИДИЕНТЫ!!!</h1>
                                <form action="addNewFood" method='post' enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" value="1">
                                    <p>Название: </p>
                                    <input type="text" name='name'>
                                    <p>Категория: </p>
                                    <select class="form-select" aria-label="Default select example" name='category'>
                                        <option value="наборы">наборы</option>
                                        <option value="суши">суши</option>
                                        <option value="роллы">роллы</option>
                                        <option value="супы">супы</option>
                                        <option value="wok">wok</option>
                                        <option value="салаты">салаты</option>
                                        <option value="закуски">закуски</option>
                                        <option value="напитки">напитки</option>
                                    </select>
                                    <input type="file" name="image">
                                    <p>Состав: </p>
                                    @foreach ($ingridients as $ingridient)
                                        <p>{{ $ingridient[0]->name }}</p>
                                    @endforeach
                                    <p></p>
                                    <p>Цена: </p>
                                    <input type="text" name='cost'>
                                    <button type="submit" class="btn btn-primary"
                                        style="height: max-content">Добавить</button>
                                </form>
                                <form action="addNewIngridient" method='post'>
                                    @csrf
                                    <select class="form-select" aria-label="Default select example"
                                        name='ingridient_id'>
                                        @foreach ($newIngridients as $ingridient)
                                            <option value="{{ $ingridient->id }}">{{ $ingridient->name }}</option>
                                        @endforeach
                                    </select>
                                    <button type='submit'>+</button>
                                </form>
                                <form action="deleteNewIngridient" method='post'>
                                    @csrf
                                    <select class="form-select" aria-label="Default select example"
                                        name='ingridient_id'>
                                        @foreach ($ingridients as $ingridient)
                                            <option value="{{ $ingridient[0]->id }}">{{ $ingridient[0]->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <button type='submit'>-</button>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                                    style="height: max-content">Закрыть</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            @foreach ($foods as $category => $foodItems)
                <h1>{{ $category }}</h1>
                <div class="category" id="{{ $category }}">
                    @foreach ($foodItems as $food)
                        <div class="item" id="{{ $food->name }}">
                            @if ($role == 3)
                                <form action="/" method="get">
                                @else
                                    <form action="/cart/add" method="post">
                            @endif
                            @if ($role != 3)
                                @csrf
                            @endif
                            <input type="hidden" name='id' value="{{ $food->id }}">
                            <img class="main-img" src="{{ asset($food->photo) }}">
                            <h1>{{ $food->name }}</h1>
                            <h3>{{ $food->ingridients }}</h3>
                            <div class="coster">
                                @if ($role == 3)
                                    <h4>{{ $food->cost }} ₽</h4><button type='submit'><img
                                            src="{{ asset('images/pen.png') }}"></button>
                                @else
                                    <h4>{{ $food->cost }} ₽</h4><button type='submit'>+</button>
                                @endif
                            </div>
                            </form>

                        </div>
                    @endforeach
                </div>
            @endforeach
        </div>
        @if ($role == 3 and isset($del['name']))
            <div class="modal fade" id="change-window" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Добавление новой позиции</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Закрыть"></button>
                        </div>
                        <div class="modal-body">
                            <h1>!!!СНАЧАЛА ДОБАВЛЯТЬ ИНГРИДИЕНТЫ!!!</h1>
                            <form class='modal_form' action="/changeName" method="post">
                                @csrf
                                <input type="hidden" name='id' value="{{ $del['id'] }}">
                                <input type="text" name='name' value={{ $del['name'] }}>
                                <button type='submit'>Поменять название</button>
                            </form>
                            <form class='modal_form' action="/changeCost" method="post">
                                @csrf
                                <input type="hidden" name='id' value="{{ $del['id'] }}">
                                <input type="text" name='cost' value={{ $del['cost'] }}>
                                <button type='submit'>Поменять цену</button>
                            </form>
                            <p>Состав:</p>
                            <p>{{ $del['ingridients'] }}</p>
                            <form action="addIngridient" method='post'>
                                @csrf
                                <input type="hidden" name='id' value="{{ $del['id'] }}">
                                <select class="form-select" aria-label="Default select example" name='ingridient_id'>
                                    @foreach ($ingridients as $ingridient)
                                        <option value="{{ $ingridient->id }}">{{ $ingridient->name }}</option>
                                    @endforeach
                                </select>
                                <button type='submit'>+</button>
                            </form>
                            <form action="deleteIngridient" method='post'>
                                @csrf
                                <input type="hidden" name='id' value="{{ $del['id'] }}">
                                <select class="form-select" aria-label="Default select example" name='ingridient_id'>
                                    @foreach ($ingridientsIn as $ingridient)
                                        <option value="{{ $ingridient['id'] }}">{{ $ingridient['name'] }}</option>
                                    @endforeach
                                </select>
                                <button type='submit'>-</button>
                            </form>
                            <form action="/deleteFood">
                                <input type="hidden" name='id' value="{{ $del['id'] }}">
                                <button type='submit'>Удалить</button>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <a href="/" class="btn btn-secondary" style="height: max-content">Закрыть</a>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </main>
    @include('templates.footer')
</body>

<script>
    let a = document.querySelector('.modal_form')


    @if (isset($modal))
        var myModal = new bootstrap.Modal(document.getElementById('modal-window'), {
            keyboard: false
        })
        myModal.show();
    @endif

    @if (isset($del['name']))
        var myModal = new bootstrap.Modal(document.getElementById('change-window'), {
            keyboard: false
        })
        myModal.show();
    @endif



    window.addEventListener('scroll', function() {
        var navigationMenu = document.querySelector('.navigation-menu');
        var scrollPosition = window.scrollY;

        if (scrollPosition > 200) {
            navigationMenu.classList.add('fixed');
        } else {
            navigationMenu.classList.remove('fixed');
        }
    });
</script>

</html>
