@extends('layouts.app')

@section('head')
<script src="https://js.stripe.com/v3/"></script>

<script type="text/javascript">
    (function(){
        // Create a Stripe client.
        var stripe = Stripe('pk_test_51GxW2BGXehimejuhdhUMwivJ4JU5NtiOwIkCXFlUnb3ulU8uh1xsaAyD6tSoTXzL6alvRl6AuvEyXPOlr1zGhSfx00cCiQya7Q');

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
        var card = elements.create('card', {style: style});

        // Add an instance of the card Element into the `card-element` <div>.
        card.mount('#card-element');

        // Handle real-time validation errors from the card Element.
        card.on('change', function(event) {
        var displayError = document.getElementById('card-errors');
        if (event.error) {
            displayError.textContent = event.error.message;
        } else {
            displayError.textContent = '';
        }
        });

        // Handle form submission.
        var form = document.getElementById('payment-form');
        form.addEventListener('submit', function(event) {
        event.preventDefault();

        stripe.createToken(card).then(function(result) {
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
    })();
</script>

<style>
    .StripeElement {
        box-sizing: border-box;

        height: 40px;

        padding: 10px 12px;

        border: 1px solid transparent;
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
    .btn:hover {
        color: black;
    }
</style>

@endsection

@section('content')
    <div class="container">
        @include('layouts.flash-messages')
        <div class="row">
            <div class="col-sm-7">
                <h3>お届け先:</h3>
                <div class="col-md-12">
                    <div class="form-group row">
                        {!! Form::label('order_ship[name]', __('validation.attributes.order_ship.name'), ['class' => 'col-sm-2 col-form-label']) !!}
                        <div class="col-sm-10">
                            {!! Form::text('order_ship[name]', null, ['class' => 'form-control'.($errors->has('order_ship.name') ? ' is-invalid' : ''), 'placeholder' => __('validation.attributes.order_ship.name')]) !!}
                            @if($errors->has('order_ship.name'))
                                @foreach($errors->get('order_ship.name') as $errorStr)
                                    <div class="invalid-feedback">{{ $errorStr }}</div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        {!! Form::label('order_ship[postal_code]', __('validation.attributes.order_ship.postal_code'), ['class' => 'col-sm-2 col-form-label']) !!}
                        <div class="col-sm-10">
                            {!! Form::text('order_ship[postal_code]', null, ['class' => 'form-control'.($errors->has('order_ship.postal_code') ? ' is-invalid' : ''), 'placeholder' => __('validation.attributes.order_ship.postal_code')]) !!}
                            @if($errors->has('order_ship.postal_code'))
                                @foreach($errors->get('order_ship.postal_code') as $errorStr)
                                    <div class="invalid-feedback">{{ $errorStr }}</div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        {!! Form::label('order_ship[address_city]', __('validation.attributes.order_ship.address_city'), ['class' => 'col-sm-2 col-form-label']) !!}
                        <div class="col-sm-10">
                            {!! Form::text('order_ship[address_city]', null, ['class' => 'form-control'.($errors->has('order_ship.address_city') ? ' is-invalid' : ''), 'placeholder' => __('validation.attributes.order_ship.address_city')]) !!}
                            @if($errors->has('order_ship.address_city'))
                                @foreach($errors->get('order_ship.address_city') as $errorStr)
                                    <div class="invalid-feedback">{{ $errorStr }}</div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        {!! Form::label('order_ship[address_street]', __('validation.attributes.order_ship.address_street'), ['class' => 'col-sm-2 col-form-label']) !!}
                        <div class="col-sm-10">
                            {!! Form::text('order_ship[address_street]', null, ['class' => 'form-control'.($errors->has('order_ship.address_street') ? ' is-invalid' : ''), 'placeholder' => __('validation.attributes.order_ship.address_street')]) !!}
                            @if($errors->has('order_ship.address_street'))
                                @foreach($errors->get('order_ship.address_street') as $errorStr)
                                    <div class="invalid-feedback">{{ $errorStr }}</div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        {!! Form::label('order_ship[phone_number]', __('validation.attributes.order_ship.phone_number'), ['class' => 'col-sm-2 col-form-label']) !!}
                        <div class="col-sm-10">
                            {!! Form::text('order_ship[phone_number]', null, ['class' => 'form-control'.($errors->has('order_ship.phone_number') ? ' is-invalid' : ''), 'placeholder' => __('validation.attributes.order_ship.phone_number')]) !!}
                            @if($errors->has('order_ship.phone_number'))
                                @foreach($errors->get('order_ship.phone_number') as $errorStr)
                                    <div class="invalid-feedback">{{ $errorStr }}</div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
                <h3>お支払い:</h3>
                <div class="col-md-12">
                    <div class="form-group row">
                        {!! Form::label('payment[name_on_card]', __('validation.attributes.payment.name_on_card'), ['class' => 'col-sm-2 col-form-label']) !!}
                        <div class="col-sm-10">
                            {!! Form::text('payment[name_on_card]', null, ['class' => 'form-control'.($errors->has('payment.name') ? ' is-invalid' : ''), 'placeholder' => __('validation.attributes.payment.name_on_card')]) !!}
                            @if($errors->has('payment.name_on_card'))
                                @foreach($errors->get('payment.name_on_card') as $errorStr)
                                    <div class="invalid-feedback">{{ $errorStr }}</div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        {!! Form::label('payment[card_number]', __('validation.attributes.payment.card_number'), ['class' => 'col-sm-2 col-form-label']) !!}
                        <div class="col-sm-10">
                            {!! Form::text('payment[card_number]', null, ['class' => 'form-control'.($errors->has('payment.card_number') ? ' is-invalid' : ''), 'placeholder' => __('validation.attributes.payment.card_number')]) !!}
                            @if($errors->has('payment.card_number'))
                                @foreach($errors->get('payment.card_number') as $errorStr)
                                    <div class="invalid-feedback">{{ $errorStr }}</div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        {!! Form::label('payment[expiry]', __('validation.attributes.payment.expiry'), ['class' => 'col-sm-2 col-form-label']) !!}
                        <div class="col-sm-10">
                            {!! Form::text('payment[expiry]', null, ['class' => 'form-control'.($errors->has('payment.expiry') ? ' is-invalid' : ''), 'placeholder' => __('validation.attributes.payment.expiry')]) !!}
                            @if($errors->has('payment.expiry'))
                                @foreach($errors->get('payment.expiry') as $errorStr)
                                    <div class="invalid-feedback">{{ $errorStr }}</div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        {!! Form::label('payment[cvc]', __('validation.attributes.payment.cvc'), ['class' => 'col-sm-2 col-form-label']) !!}
                        <div class="col-sm-10">
                            {!! Form::text('payment[cvc]', null, ['class' => 'form-control'.($errors->has('payment.cvc') ? ' is-invalid' : ''), 'placeholder' => __('validation.attributes.payment.cvc')]) !!}
                            @if($errors->has('payment.cvc'))
                                @foreach($errors->get('payment.cvc') as $errorStr)
                                    <div class="invalid-feedback">{{ $errorStr }}</div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <div class="form-group row">
                        {!! Form::label('card-element', __('CreditOrDebit'), ['class' => 'col-sm-2 col-form-label']) !!}
                        <div class="col-sm-10">
                            {!! Form::text('card-element', null, ['id' => 'card-element', 'placeholder' => __('CreditOrDebit')]) !!}
                            <div id="card-errors" role="alert"></div>
                        </div>
                    </div>
                    <button>Submit Payment</button>
                </div>
            </div>
            <div class="col-sm-5">
                <h3>ご注文内容:</h3>
                <table class="table table-hover">
                    <thead>
                    <tr>
                        {{--                        <th>id</th>--}}
                        <th>name</th>
                        <th>price</th>
                        <th>quantity</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach(Cart::getContent() as $item)
                        <tr>
                            <td>{{ $item->name }}</td>
                            <td>&yen;{{ number_format($item->price) }}</td>
                            <td>{{ $item->quantity }}</td>
                        </tr>
                    @endforeach
                    <tr>
                        <td class="text-right">合計:</td>
                        <td>&yen;{{ number_format(Cart::getSubTotal()) }}</td>
                        <td>{{ Cart::getTotalQuantity() }}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection