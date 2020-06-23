@extends('layouts.app')

@section('content')
    <div class="container">
        @include('layouts.flash-messages')
        <div class="row">
            <div class="col-md-12">
                <h3>ご注文内容:</h3>
            </div>
            <div class="col-md-12">
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

        <div class="row">
            <div class="col-md-12">
                <h3>お届け先:</h3>
            </div>
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
                    {!! Form::label('order_ship[postal_code3]', __('validation.attributes.order_ship.postal_code3'), ['class' => 'col-sm-2 col-form-label']) !!}
                    <div class="col-sm-10">
                        {!! Form::text('order_ship[postal_code3]', null, ['class' => 'form-control'.($errors->has('order_ship.postal_code3') ? ' is-invalid' : ''), 'placeholder' => __('validation.attributes.order_ship.postal_code3')]) !!}
                        @if($errors->has('order_ship.postal_code3'))
                            @foreach($errors->get('order_ship.postal_code3') as $errorStr)
                                <div class="invalid-feedback">{{ $errorStr }}</div>
                            @endforeach
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    {!! Form::label('order_ship[postal_code4]', __('validation.attributes.order_ship.postal_code4'), ['class' => 'col-sm-2 col-form-label']) !!}
                    <div class="col-sm-10">
                        {!! Form::text('order_ship[postal_code4]', null, ['class' => 'form-control'.($errors->has('order_ship.postal_code4') ? ' is-invalid' : ''), 'placeholder' => __('validation.attributes.order_ship.postal_code4')]) !!}
                        @if($errors->has('order_ship.postal_code4'))
                            @foreach($errors->get('order_ship.postal_code4') as $errorStr)
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
        </div>
        <div class="row">
            <div class="col-md-12">
                <h3>請求先:</h3>
            </div>
            <div class="col-md-12">
                <div class="form-group row">
                    {!! Form::label('order_bill[name]', __('validation.attributes.order_bill.name'), ['class' => 'col-sm-2 col-form-label']) !!}
                    <div class="col-sm-10">
                        {!! Form::text('order_bill[name]', null, ['class' => 'form-control'.($errors->has('order_bill.name') ? ' is-invalid' : ''), 'placeholder' => __('validation.attributes.order_bill.name')]) !!}
                        @if($errors->has('order_bill.name'))
                            @foreach($errors->get('order_bill.name') as $errorStr)
                                <div class="invalid-feedback">{{ $errorStr }}</div>
                            @endforeach
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    {!! Form::label('order_bill[postal_code3]', __('validation.attributes.order_bill.postal_code3'), ['class' => 'col-sm-2 col-form-label']) !!}
                    <div class="col-sm-10">
                        {!! Form::text('order_bill[postal_code3]', null, ['class' => 'form-control'.($errors->has('order_bill.postal_code3') ? ' is-invalid' : ''), 'placeholder' => __('validation.attributes.order_bill.postal_code3')]) !!}
                        @if($errors->has('order_bill.postal_code3'))
                            @foreach($errors->get('order_bill.postal_code3') as $errorStr)
                                <div class="invalid-feedback">{{ $errorStr }}</div>
                            @endforeach
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    {!! Form::label('order_bill[postal_code4]', __('validation.attributes.order_bill.postal_code4'), ['class' => 'col-sm-2 col-form-label']) !!}
                    <div class="col-sm-10">
                        {!! Form::text('order_bill[postal_code4]', null, ['class' => 'form-control'.($errors->has('order_bill.postal_code4') ? ' is-invalid' : ''), 'placeholder' => __('validation.attributes.order_bill.postal_code4')]) !!}
                        @if($errors->has('order_bill.postal_code4'))
                            @foreach($errors->get('order_bill.postal_code4') as $errorStr)
                                <div class="invalid-feedback">{{ $errorStr }}</div>
                            @endforeach
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    {!! Form::label('order_bill[address_city]', __('validation.attributes.order_bill.address_city'), ['class' => 'col-sm-2 col-form-label']) !!}
                    <div class="col-sm-10">
                        {!! Form::text('order_bill[address_city]', null, ['class' => 'form-control'.($errors->has('order_bill.address_city') ? ' is-invalid' : ''), 'placeholder' => __('validation.attributes.order_bill.address_city')]) !!}
                        @if($errors->has('order_bill.address_city'))
                            @foreach($errors->get('order_bill.address_city') as $errorStr)
                                <div class="invalid-feedback">{{ $errorStr }}</div>
                            @endforeach
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    {!! Form::label('order_bill[address_street]', __('validation.attributes.order_bill.address_street'), ['class' => 'col-sm-2 col-form-label']) !!}
                    <div class="col-sm-10">
                        {!! Form::text('order_bill[address_street]', null, ['class' => 'form-control'.($errors->has('order_bill.address_street') ? ' is-invalid' : ''), 'placeholder' => __('validation.attributes.order_bill.address_street')]) !!}
                        @if($errors->has('order_bill.address_street'))
                            @foreach($errors->get('order_bill.address_street') as $errorStr)
                                <div class="invalid-feedback">{{ $errorStr }}</div>
                            @endforeach
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    {!! Form::label('order_bill[phone_number]', __('validation.attributes.order_bill.phone_number'), ['class' => 'col-sm-2 col-form-label']) !!}
                    <div class="col-sm-10">
                        {!! Form::text('order_bill[phone_number]', null, ['class' => 'form-control'.($errors->has('order_bill.phone_number') ? ' is-invalid' : ''), 'placeholder' => __('validation.attributes.order_bill.phone_number')]) !!}
                        @if($errors->has('order_bill.phone_number'))
                            @foreach($errors->get('order_bill.phone_number') as $errorStr)
                                <div class="invalid-feedback">{{ $errorStr }}</div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h3>支払い方法:</h3>
            </div>
            <div class="col-md-12">未実装(また、請求先と同一 section となる可能性がある)</div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h3>注文する</h3>
            </div>
            <div class="offset-md-2 col-md-10">
                <button type="submit" class="btn btn-outline-primary">注文する</button>
            </div>
        </div>

    </div>
@endsection