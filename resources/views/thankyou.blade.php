@extends('layout.app')

@section('content')

   <div class="thank-you-sectcion">
       <h1>注文が完了しました</h1>
       <div class="spacer"></div>
       <div>
           <a href="{{ url('/products') }}" class="button">注文を続ける</a>
       </div>
   </div>

@endsection
