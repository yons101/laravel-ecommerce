<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>ecom</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:400,900">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="assets/css/Bootstrap-Payment-Form.css">

    <link rel="stylesheet" href="assets/css/Footer-Basic.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="assets/css/Navigation-Clean.css">
    <link rel="stylesheet" href="assets/css/styles.css">


</head>

<body>
    <header>
        <nav class="navbar navbar-light navbar-expand-md navigation-clean mb-0">
            <div class="container"><a class="navbar-brand" href="{{ url('/') }}"><i
                        class="fab fa-apple logo"></i>Apple101</a><button data-toggle="collapse" class="navbar-toggler"
                    data-target="#navcol-1"><span class="sr-only">Toggle
                        {{-- style="transform: rotate(90deg);" --}}
                        navigation</span><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navcol-1">
                    <ul class="nav navbar-nav mx-auto">
                        <li class="nav-item" role="presentation"><a class="nav-link"
                                href="{{route('category.show', 'iphone')}}">iPhone</a></li>

                        <li class="nav-item" role="presentation"><a class="nav-link"
                                href="{{route('category.show', 'mac')}}">Mac</a></li>

                        <li class="nav-item" role="presentation"><a class="nav-link"
                                href="{{route('category.show', 'ipad')}}">iPad</a></li>


                    </ul>
                    <ul class="nav navbar-nav ml-0">


                        @guest
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" href="{{ route('login') }}">
                                Login
                            </a>
                        </li>


                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @endif
                        @else


                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->username }} <span class="caret"></span>
                            </a>

                            {{-- Check if the user is a user --}}
                            @if (Auth::user()->roles[0]->name != "admin")

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{route('profile.index')}}">
                                    Profile
                                </a>
                                <a class="dropdown-item" href="/orders">
                                    Orders
                                </a>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                                        document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>

                        <li class="nav-item" role="presentation">
                            {{-- d-flex align-items-center --}}
                            <a class="nav-link" href="{{ route('cart.index') }}">
                                <i class="fas fa-shopping-cart mr-1"></i>

                                @if(Auth::user()->cart->products->count()>0)
                                <span>{{Auth::user()->cart->products->count()}}</span>

                                @endif
                            </a>

                        </li>

                        {{-- Check if the user is an admin --}}
                        @else

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{route('productmanager.index')}}">
                                Product Manager
                            </a>
                            <a class="dropdown-item" href="{{route('usermanager.index')}}">
                                Users Manager
                            </a>
                            <a class="dropdown-item" href="{{route('ordermanager.index')}}">
                                Orders Manager
                            </a>

                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                        @endif
                        @endguest

                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <div class="container main-container">



        <h2 class="ml-1"><i class="far fa-credit-card"></i>&nbsp;Checkout</h2>
        <div class="row mt-5">



            <div class="col-12 col-md-6 payment">
                <div class="card credit-card-box mx-3">
                    <div class="card-header">
                        <h3 class="d-flex justify-content-between align-items-center"><span
                                class="panel-title-text">Payment
                                Details </span><img class="img-fluid panel-title-image w-50"
                                src="assets/img/payment-methods.png"></h3>
                    </div>
                    <div class="card-body border rounded">

                        <form action="{{route('sandbox.store')}}" method="post" id="payment-form">
                            {{-- onsubmit="event.preventDefault();" --}}
                            @csrf
                            <div class="form-group">
                                <label for="name">Full Name</label>
                                <input type="text" class="form-control" id="name" name="name">
                            </div>

                            <div class="form-group">
                                <label for="address">Full Address</label>
                                <input type="text" class="form-control" id="address" name="address">
                            </div>

                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input type="tel" class="form-control" id="phone" name="phone">
                            </div>

                            <div class="form-group">
                                <label for="city">City</label>
                                <input type="text" class="form-control" id="city" name="city">
                            </div>

                            <div class="form-group">
                                <label for="province">Province</label>
                                <input type="text" class="form-control" id="province" name="province">
                            </div>

                            <div class="form-group">
                                <label for="zip">Zip</label>
                                <input type="text" class="form-control" id="zip" name="zip">
                            </div>
                            <div class="form-group">
                                <label for="country">Country</label>
                                @include('inc.country-list')
                            </div>

                            {{-- <div class="form-group">
                                <label for="card-element">
                                    Credit or debit card
                                </label>
                                <div id="card-element" class="form-control">
                                    <!-- A Stripe Element will be inserted here. -->
                                </div>

                                <!-- Used to display form errors. -->
                                <div id="card-errors" role="alert"></div>
                            </div> --}}


                            <div class="form-group row">
                                <div class="col-md-12">
                                    <input id="card_no" type="text"
                                        class="form-control @error('card_no') is-invalid @enderror" name="card_no"
                                        value="{{ old('card_no') }}" required autocomplete="card_no"
                                        placeholder="Card No." autofocus>
                                    @error('card_no')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <input id="exp_month" type="text"
                                        class="form-control @error('exp_month') is-invalid @enderror" name="exp_month"
                                        value="{{ old('exp_month') }}" required autocomplete="exp_month"
                                        placeholder="Exp. Month (Eg. 02)" autofocus>
                                    @error('exp_month')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <input id="exp_year" type="text"
                                        class="form-control @error('exp_year') is-invalid @enderror" name="exp_year"
                                        value="{{ old('exp_year') }}" required autocomplete="exp_year"
                                        placeholder="Exp. Year (Eg. 2020)" autofocus>
                                    @error('exp_year')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <input id="cvv" type="password"
                                        class="form-control @error('cvv') is-invalid @enderror" name="cvv" required
                                        autocomplete="current-password" placeholder="CVV">
                                    @error('cvv')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <input id="amount" type="text"
                                        class="form-control @error('amount') is-invalid @enderror" name="amount"
                                        required autocomplete="current-password" placeholder="Amount">
                                    @error('amount')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary btn-block">
                                        {{ __('PAY NOW') }}
                                    </button>
                                </div>
                            </div>


                            <button class="btn btn-dark mt-2">Submit Payment</button>
                        </form>

                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6">
                <h3>Your Order</h3>
                @if(isset($products) && $products->isNotEmpty())

                <table class="table table-striped table-responsive-md">
                    <thead>
                        <tr>
                            <th scope="col">img</th>
                            <th scope="col">title</th>
                            <th scope="col">qty</th>
                            <th scope="col">price</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- Products that have the same id, used for quantiy--}}
                        @foreach($products as $row)

                        @foreach ($row as $item)

                        @if ($item->id != $lastId)

                        <tr>
                            @php
                            $lastId = $item->id;
                            @endphp

                            <td class="align-middle">
                                <a href="{{route('products.show', $item->slug)}}" class="text-dark">
                                    <img src="{{$item->image}}" alt="" style="width:4rem;">
                                </a>
                            </td>

                            <td class="align-middle">
                                <a href="{{route('products.show', $item->slug)}}" class="text-dark">
                                    {{$item->title}}
                                </a>
                            </td>

                            <td class="align-middle">
                                <span>{{count($row)}}</span>
                            </td>

                            <td class="align-middle">{{$item->price * count($row)}} DH</td>

                        </tr>
                        @endif

                        @endforeach

                        @endforeach
                        <tr>
                            <td colspan="4"></td>
                        </tr>
                        <tr>
                            <td colspan="2" class=""><b class="h2">Total : {{$totalPrice}} DH</b></td>
                            <td colspan="2" class="">
                                <form action="{{route('cart.index')}}" method="get">
                                    @csrf
                                    <button class="btn btn-light border p-1" type="submit">Edit the cart</button>
                                </form>
                            </td>
                        </tr>
                    </tbody>
                </table>
                @else
                <h1>No products</h1>
                @endif
            </div>
        </div>


    </div>
    <div class="footer-basic">
        <footer>
            <div class="social"><a href="#"><i class="icon ion-social-instagram"></i></a><a href="#"><i
                        class="icon ion-social-twitter"></i></a><a href="#"><i class="icon ion-social-facebook"></i></a>
            </div>
            <ul class="list-inline">
                <li class="list-inline-item"><a href="#">Home</a></li>
                <li class="list-inline-item"><a href="#">About</a></li>
                <li class="list-inline-item"><a href="#">Terms</a></li>
                <li class="list-inline-item"><a href="#">Privacy Policy</a></li>
            </ul>
            <div id="copyright-container">
                <p class="copyright">Apple101 © 2020</p>
            </div>
        </footer>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
</body>



</html>