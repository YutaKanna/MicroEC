@extends('layouts.app')

@section('head')
<script src="https://js.stripe.com/v3/"></script>

<style>
    .StripeElement {
        box-sizing: border-box;

        height: 40px;

        padding: 10px 12px;

        border: 1px solid black;
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
                {!! Form::open([
                    'route' => ['order.store'],
                    'method' => 'post',
                    'id'=> 'payment-form',
                ]) !!}
                {{ csrf_field() }}
                    <h3>お届け先:</h3>
                    <div class="col-md-12">
                        <div class="form-group row">
                            {!! Form::label('name', __('validation.attributes.order_ship.name'), ['class' => 'col-sm-2 col-form-label']) !!}
                            <div class="col-sm-10">
                                {!! Form::text('name', null, [
                                        'class' => 'form-control'.($errors->has('name') ? ' is-invalid' : ''),
                                        'id' => 'name',
                                        'placeholder' => __('validation.attributes.order_ship.name'),
                                ]) !!}
                            </div>
                        </div>
                        <div class="form-group row">
                            {!! Form::label('email', __('validation.attributes.order_ship.email'), ['class' => 'col-sm-2 col-form-label']) !!}
                            <div class="col-sm-10">
                                {!! Form::text('email', null, [
                                        'class' => 'form-control'.($errors->has('email') ? ' is-invalid' : ''),
                                        'id' => 'email',
                                        'placeholder' => __('validation.attributes.order_ship.email'),
                                ]) !!}
                            </div>
                        </div>
                        <div class="form-group row">
                            {!! Form::label('postalcode', __('validation.attributes.order_ship.postal_code'), ['class' => 'col-sm-2 col-form-label']) !!}
                            <div class="col-sm-10">
                                {!! Form::text('postalcode', null, [
                                        'class' => 'form-control'.($errors->has('postalcode') ? ' is-invalid' : ''),
                                        'id' => 'postalcode',
                                        'placeholder' => __('validation.attributes.order_ship.postal_code'),
                                ]) !!}
                            </div>
                        </div>
                        <div class="form-group row">
                            {!! Form::label('address', __('validation.attributes.order_ship.address'), ['class' => 'col-sm-2 col-form-label']) !!}
                            <div class="col-sm-10">
                                {!! Form::text('address', null, [
                                        'class' => 'form-control'.($errors->has('address') ? ' is-invalid' : ''),
                                        'id' => 'address',
                                        'placeholder' => __('validation.attributes.order_ship.address'),
                                ]) !!}
                            </div>
                        </div>
                        <div class="form-group row">
                            {!! Form::label('city', __('validation.attributes.order_ship.city'), ['class' => 'col-sm-2 col-form-label']) !!}
                            <div class="col-sm-10">
                                {!! Form::text('city', null, [
                                        'class' => 'form-control'.($errors->has('city') ? ' is-invalid' : ''),
                                        'id' => 'city',
                                        'placeholder' => __('validation.attributes.order_ship.city'),
                                ]) !!}
                            </div>
                        </div>
                        <div class="form-group row">
                            {!! Form::label('province', __('validation.attributes.order_ship.province'), ['class' => 'col-sm-2 col-form-label']) !!}
                            <div class="col-sm-10">
                                {!! Form::text('province', null, [
                                        'class' => 'form-control'.($errors->has('province') ? ' is-invalid' : ''),
                                        'id' => 'province',
                                        'placeholder' => __('validation.attributes.order_ship.province'),
                                ]) !!}
                            </div>
                        </div>
                        <div class="form-group row">
                            {!! Form::label('phone', __('validation.attributes.order_ship.phone'), ['class' => 'col-sm-2 col-form-label']) !!}
                            <div class="col-sm-10">
                                {!! Form::text('phone', null, [
                                        'class' => 'form-control'.($errors->has('phone') ? ' is-invalid' : ''),
                                        'id' => 'phone',
                                        'placeholder' => __('validation.attributes.order_ship.phone'),
                                ]) !!}
                            </div>
                        </div>
                    </div>
                    <h3>お支払い:</h3>
                    <div class="form-group">
                        <label for="name_on_card">Name on Card</label>
                        <input type="text" class="form-control" id="name_on_card" name="name_on_card" value="">
                    </div>

                    <div class="form-group">
                        <label for="card-element">
                            Credit or debit card
                        </label>
                        <div id="card-element">
                            <!-- a Stripe Element will be inserted here. -->
                        </div>

                        <!-- Used to display form errors -->
                        <div id="card-errors" role="alert"></div>
                    </div>
                    <div class="spacer"></div>

                    <button type="submit" id="complete-order" class="button-primary full-width">Complete Order</button>
                {!! Form::close() !!}
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

@section('extra-js')
    <script>
        (function(){
            // Create a Stripe client
            var stripe = Stripe('pk_test_51GxW2BGXehimejuhdhUMwivJ4JU5NtiOwIkCXFlUnb3ulU8uh1xsaAyD6tSoTXzL6alvRl6AuvEyXPOlr1zGhSfx00cCiQya7Q');

            // Create an instance of Elements
            var elements = stripe.elements();

            // Custom styling can be passed to options when creating an Element.
            // (Note that this demo uses a wider set of styles than the guide below.)
            var style = {
              base: {
                color: '#32325d',
                lineHeight: '18px',
                fontFamily: '"Roboto", Helvetica Neue", Helvetica, sans-serif',
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

            // Create an instance of the card Element
            var card = elements.create('card', {
                style: style,
                hidePostalCode: true
            });

            // Add an instance of the card Element into the `card-element` <div>
            card.mount('#card-element');

            // Handle real-time validation errors from the card Element.
            card.addEventListener('change', function(event) {
              var displayError = document.getElementById('card-errors');
              if (event.error) {
                displayError.textContent = event.error.message;
              } else {
                displayError.textContent = '';
              }
            });

            // Handle form submission
            var form = document.getElementById('payment-form');
            form.addEventListener('submit', function(event) {
              event.preventDefault();

              // Disable the submit button to prevent repeated clicks
              document.getElementById('complete-order').disabled = true;

              var options = {
                name: document.getElementById('name_on_card').value,
                address_line1: document.getElementById('address').value,
                address_city: document.getElementById('city').value,
                address_state: document.getElementById('province').value,
                address_zip: document.getElementById('postalcode').value
              }

              stripe.createToken(card, options).then(function(result) {
                if (result.error) {
                  // Inform the user if there was an error
                  var errorElement = document.getElementById('card-errors');
                  errorElement.textContent = result.error.message;

                  // Enable the submit button
                  document.getElementById('complete-order').disabled = false;
                } else {
                  // Send the token to your server
                  stripeTokenHandler(result.token);
                }
              });
            });

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
@endsection
