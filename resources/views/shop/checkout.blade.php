@extends('layouts.appWithoutSidebar')

@section('content')
    <div class="raw">
        <div class="col-sm-6 col-md-4 col-md-offset-4 col-sm-offset-3">
        <h1>Checkout</h1>
            <h4>Your total: {{Cart::total()}}</h4>
            <form action="{{asset('checkout')}}" method="post" id="payment-form">
                {{$token}}
                    <div class="form-row">
                    <label for="card-element">
                    Credit or debit card
                    </label>
                    <div id="card-element">
                        <!-- a Stripe Element will be inserted here. -->
                    </div>

                    <!-- Used to display form errors -->
                    <div id="card-errors" role="alert"></div>
                    </div>
                    <button>Submit Payment</button>

            </form>
        </div>
    </div>
@endsection