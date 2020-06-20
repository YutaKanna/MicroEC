@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
        </div>
        <div class="row">
            <div class="card-deck">
                @foreach($products as $product)
                    <div class="card">
                        <img class="card-img-top" data-src="holder.js/100px160/" alt="100%x160" src="data:image/svg+xml;charset=UTF-8,%3Csvg%20width%3D%22227%22%20height%3D%22160%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%20227%20160%22%20preserveAspectRatio%3D%22none%22%3E%3Cdefs%3E%3Cstyle%20type%3D%22text%2Fcss%22%3E%23holder_168f2c685f8%20text%20%7B%20fill%3Argba(255%2C255%2C255%2C.75)%3Bfont-weight%3Anormal%3Bfont-family%3AHelvetica%2C%20monospace%3Bfont-size%3A11pt%20%7D%20%3C%2Fstyle%3E%3C%2Fdefs%3E%3Cg%20id%3D%22holder_168f2c685f8%22%3E%3Crect%20width%3D%22227%22%20height%3D%22160%22%20fill%3D%22%23777%22%3E%3C%2Frect%3E%3Cg%3E%3Ctext%20x%3D%2285.3828125%22%20y%3D%2284.8%22%3E227x160%3C%2Ftext%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E" data-holder-rendered="true" style="height: 160px; width: 100%; display: block;">
                        <div class="card-body">
                            <h5 class="card-title"><a href="{{ route('products.show', $product) }}">{{ $product->name }}</a></h5>
                            <p class="card-text">{{ $product->price ?? '' }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
