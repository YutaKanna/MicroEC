@extends('layouts.app')

@section('content')
    <div class="container">
        @include('layouts.flash-messages')
        <div class="row">
            <div class="col-sm-7">
                {!! Form::open([
                    'route' => [''],
                    'method' => 'post',
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
                    <button type="submit">Complete Order</button>
                {!! Form::close() !!}
            </div>
            <div class="col-sm-5">
                <h3>ご注文内容:</h3>
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>name</th>
                        <th>price</th>
                        <th>quantity</th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>dd</td>
                            <td>dd</td>
                            <td>dd</td>
                        </tr>
                        <tr>
                            <td>dd</td>
                            <td>dd</td>
                            <td>dd</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
