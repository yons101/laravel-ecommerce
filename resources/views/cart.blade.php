@extends('layouts.app')

@section('content')

<h2 class="ml-1"><i class="far fa-credit-card"></i>&nbsp;Checkout</h2>
<div class="row mt-5">
    <div class="col-12 col-md-6 payment">
        <div class="card credit-card-box mx-3">
            <div class="card-header">
                <h3 class="d-flex justify-content-between align-items-center"><span class="panel-title-text">Payment Details </span><img class="img-fluid panel-title-image w-50" src="assets/img/payment-methods.png"></h3>
            </div>
            <div class="card-body border rounded">
                <form id="payment-form">
                    <div class="form-row">
                        <div class="col-12">
                            <div class="form-group"><label for="cardNumber">Card number </label>
                                <div class="input-group"><input class="form-control" type="tel" id="cardNumber" required="" placeholder="Valid Card Number">
                                    <div class="input-group-append"><span class="input-group-text"><i class="fas fa-credit-card"></i></span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-7">
                            <div class="form-group"><label for="cardExpiry"><span>expiration </span><span>EXP
                                    </span> date</label><input class="form-control" type="tel" id="cardExpiry" required="" placeholder="MM / YY"></div>
                        </div>
                        <div class="col-5 pull-right">
                            <div class="form-group"><label for="cardCVC">cv code</label><input class="form-control" type="tel" id="cardCVC" required="" placeholder="CVC">
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-12"><button class="btn btn-block btn-lg text-white bg-dark" type="submit">Place Order</button></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-6">
        <h3>Your Order</h3>
        <div class="d-flex flex-column p-5">
            <div>
                <ul class="list-group">
                    <li class="list-group-item"><span>List Group Item 1</span></li>
                    <li class="list-group-item"><span>List Group Item 2</span></li>
                    <li class="list-group-item"><span><br>List Group Item 3<br><br>List Group Item 3<br><br>List
                            Group Item 3<br><br>List Group Item 3<br><br></span></li>
                </ul>
            </div>
            <div class="mt-5 d-flex justify-content-between h2"><span>Total</span>
                <div><span class="mr-1">5000</span><span>DH</span></div>
            </div>
        </div>
    </div>
</div>
@endsection
