@extends('layouts.app')

@section('content')
    <div class="container">
        @include('layouts.flash-messages')
        <div class="row">
            <div class="col-sm-4">
                <img class="card-img-top" data-src="holder.js/100px160/" alt="100%x160" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22227%22%20height%3D%22160%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20227%20160%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_168f2c685f8%20text%20%7B%20fill%3Argba(255%2C255%2C255%2C.75)%3Bfont-weight%3Anormal%3Bfont-family%3AHelvetica%2C%20monospace%3Bfont-size%3A11pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_168f2c685f8%22%3E%3Crect%20width%3D%22227%22%20height%3D%22160%22%20fill%3D%22%23777%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%2285.3828125%22%20y%3D%2284.8%22%3E227x160%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" data-holder-rendered="true" style="height: 160px; width: 100%; display: block;">
            </div>
            <div class="col-sm-8">
                <div class="row">
                    <div class="col-sm-12"><h3>{{ $product->name ?? '' }}</h3></div>
                </div>
                <div class="row">
                    <div class="col-sm-12"><hr /></div>
                </div>
                <div class="row">
                    <div class="col-sm-12">■商品説明</div>
                    <div class="col-sm-12">{{ $product->description ?? '' }}</div>
                </div>
                <div class="row">
                    <div class="col-sm-12"><hr /></div>
                </div>
                <div class="row">
                    <div class="col-sm-12">■値段</div>
                    <div class="col-sm-12">@if($product->price)&yen;{{ number_format($product->price) }}@endif</div>
                </div>
                <div class="row">
                    <div class="col-sm-12"><hr /></div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        {!! Form::open([
                        'route' => ['cart.add_item'],
                        'method' => 'post',
                        ]) !!}
                        <div class="form-group row">
                            {!! Form::label('quantity', '個数', ['class' => 'col-sm-2 col-form-label']) !!}
                            <div class="col-sm-3">
                                {!! Form::text('quantity', old('quantity', 1), ['class' => 'form-control'.($errors->has('quantity') ? ' is-invalid' : ''), 'placeholder' => '1']) !!}
                                @if($errors->has('quantity'))
                                    @foreach($errors->get('quantity') as $errorStr)
                                        <div class="invalid-feedback">{{ $errorStr }}</div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="offset-sm-2 col-sm-10">
                                <button type="submit" class="btn btn-outline-primary btn-lg">カートに入れる <i class="fas fa-cart-plus"></i></button>
                            </div>
                        </div>
                        <input type="hidden" name="product_id" value="{{ $product->id }}" />
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
