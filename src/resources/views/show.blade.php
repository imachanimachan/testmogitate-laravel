 @extends('layout.app')

 @section('css')
 <link rel="stylesheet" href="{{ asset('css/show.css')}}">
 @endsection

 @section('content')
 <p>商品詳細画面</p>
 <img src="{{ asset('storage/' . $product->image) }}" alt="{{$product->name}}">
 <p>{{$product->name}}</p>
 @endsection