@extends('layouts.app')

@section('content')

<h2 class="ml-1"><i class="far fa-credit-card"></i>&nbsp;Checkout</h2>
<div class="row mt-5">
    <div class="col-12 col-md-6">
        <h3>3 items in your cart</h3>
        <div class="d-flex flex-column p-5">
            <div>
                <ul class="list-group">
                    <li class="list-group-item"><span>List Group Item 1</span></li>
                    <li class="list-group-item"><span>List Group Item 2</span></li>
                    <li class="list-group-item"><span>List Group Item 3</span></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-6 p-md-5">
        <div class="mt-5 d-flex justify-content-between h2"><span>Total</span>
            <div><span class="mr-1">5000</span><span>DH</span></div>
        </div><button class="btn btn-dark d-block w-100 mt-5 mx-auto" id="btn-checkout" type="button">Check
            Out</button>
    </div>
</div>
@endsection
