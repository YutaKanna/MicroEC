@extends('layouts.app')

@section('content')
    <div class="container">
        @include('layouts.flash-messages')
        <div class="row">
            <div class="col-md-12">
                <table class="table table-hover">
                    <thead>
                    <tr>
{{--                        <th>id</th>--}}
                        <th>name</th>
                        <th>price</th>
                        <th>quantity</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach(Cart::getContent() as $item)
                        <tr>
                            <td>{{ $item->name }}</td>
                            <td>&yen;{{ number_format($item->price) }}</td>
                            <td>
                                {!! Form::open([
                                'route' => ['cart.update_quantity'],
                                'method' => 'post',
                                'class' => 'form-row align-items-center'
                                ]) !!}

                                <div class="col-auto">
                                    {!! Form::text('quantity', old('quantity', $item->quantity), ['class' => 'form-control'.($errors->has('quantity') ? ' is-invalid' : '')]) !!}
                                </div>

                                <div class="col-auto">
                                    <button type="submit" class="btn btn-outline-primary">変更</button>
                                </div>

                                <input type="hidden" name="product_id" value="{{ $item->id }}" />
                                {!! Form::close() !!}
                            </td>
                            <td>
                                {!! Form::open([
                                'route' => ['cart.remove_item'],
                                'method' => 'post',
                                ]) !!}
                                <button type="submit" class="btn btn-outline-dark">カートから削除</button>
                                <input type="hidden" name="product_id" value="{{ $item->id }}" />
                                {!! Form::close() !!}
                            </td>
                        </tr>
                    @endforeach
                    <tr>
                        <td class="text-right">合計:</td>
                        <td>&yen;{{ number_format(Cart::getSubTotal()) }}</td>
                        <td>{{ Cart::getTotalQuantity() }}</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><button type="submit" class="btn btn-outline-primary"><a href="{{ route('order.index') }}" class="btn btn-yellow">レジへすすむ</a></button></td>
                        <td></td>
                        <td></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
