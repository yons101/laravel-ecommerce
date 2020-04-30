@extends('layouts.app')


@section('script')
<script src="https://js.stripe.com/v3/"></script>
@endsection

@section('style')
<link rel="stylesheet" href="{{ asset('assets/css/stripe.css') }}">@endsection
@section('content')

<h2 class="ml-1"><i class="far fa-credit-card"></i>&nbsp;Checkout</h2>
<div class="row mt-5">



    <div class="col-12 col-md-6 payment">
        <div class="card credit-card-box mx-3">
            <div class="card-header">
                <h3 class="d-flex justify-content-between align-items-center"><span class="panel-title-text">Payment
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
@endsection

@section('script2')
<script src="{{ asset('assets/js/stripe.js') }}"></script>
@endsection