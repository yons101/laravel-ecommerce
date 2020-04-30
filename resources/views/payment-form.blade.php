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