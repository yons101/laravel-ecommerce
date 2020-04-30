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
    <script src="https://js.stripe.com/v3/"></script>

    <style>
        .StripeElement {
            box-sizing: border-box;

            height: 40px;

            padding: 10px 12px;

            border: 1px solid transparent;
            border-radius: 4px;
            background-color: white;

            box-shadow: 0 1px 3px 0 #e6ebf1;
            -webkit-transition: box-shadow 150ms ease;
            transition: box-shadow 150ms ease;
        }

        .StripeElement--focus {
            box-shadow: 0 1px 3px 0 #cfd7df;
        }

        .StripeElement--invalid {
            border-color: #fa755a;
        }

        .StripeElement--webkit-autofill {
            background-color: #fefde5 !important;
        }
    </style>
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

                        <form action="{{route('checkout.store')}}" method="post" id="payment-form">
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
                                <label for="phone">Phone</label>
                                <input type="tel" class="form-control" id="phone" name="phone">
                            </div>
                            <div class="form-group">
                                <label for="card-element">
                                    Credit or debit card
                                </label>
                                <div id="card-element">
                                    <!-- A Stripe Element will be inserted here. -->
                                </div>

                                <!-- Used to display form errors. -->
                                <div id="card-errors" role="alert"></div>
                            </div>

                            <button class="btn btn-dark mt-2">Submit Payment</button>
                        </form>
                        {{-- <form action="{{route('orders.store')}}" method="post">
                        <input type="hidden" name="user_id" value="{{Auth::id()}}">

                        @csrf

                        <button type="button">ok</button>
                        </form> --}}
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


<script>
    // Create a Stripe client.
    var stripe = Stripe('pk_test_rk0ZnuvxgbWgyAtrvbZcrO0m00g2m55VTD');
    
    // Create an instance of Elements.
    var elements = stripe.elements();
    
    // Custom styling can be passed to options when creating an Element.
    // (Note that this demo uses a wider set of styles than the guide below.)
    var style = {
    base: {
    color: '#32325d',
    fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
    fontSmoothing: 'antialiased',
    fontSize: '16px',
    '::placeholder': {
    color: '#aab7c4'
    }
    },
    invalid: {
    color: '#fa755a',
    iconColor: '#fa755a'
    }
    
    };
    
    // Create an instance of the card Element.
    var card = elements.create('card', {
    style: style,
    hidePostalCode: true
    });
    
    // Add an instance of the card Element into the `card-element` <div>.
        card.mount('#card-element');
    
        // Handle real-time validation errors from the card Element.
        card.addEventListener('change', function (event) {
    
        var displayError = document.getElementById('card-errors');
        if (event.error) {
        displayError.textContent = event.error.message;
        } else {
        displayError.textContent = '';
        }
        });
    
        // Handle form submission.
        var form = document.getElementById('payment-form');
    
        form.addEventListener('submit', function (event) {
    
    
        event.preventDefault();
    
    
        // var options = {
        // // name: document.getElementById('name').value,
        // address_line1: document.getElementById('address').value,
        // adress_city: document.getElementById('city').value,
        // adress_state: document.getElementById('province').value,
        // adress_zip: document.getElementById('zip').value,
        // }
        stripe.createToken(card).then(function (result) {
        if (result.error) {
        // Inform the user if there was an error.
        var errorElement = document.getElementById('card-errors');
        errorElement.textContent = result.error.message;
    
        } else {
        // Send the token to your server.
    
        stripeTokenHandler(result.token);
    
        }
        });
        });
    
        // Submit the form with the token ID.
        function stripeTokenHandler(token) {
    
        // Insert the token ID into the form so it gets submitted to the server
        var form = document.getElementById('payment-form');
        var hiddenInput = document.createElement('input');
        hiddenInput.setAttribute('type', 'hidden');
        hiddenInput.setAttribute('name', 'stripeToken');
        hiddenInput.setAttribute('value', token.id);
        form.appendChild(hiddenInput);
    
        // Submit the form
        form.submit();
        }
</script>

</html>