@extends('layouts.main')

@section('title','Products')
@section('content')
<h1>{{$products->count()}} </h1>
@foreach ($products as $product)
<a href="{{route('showOne',[$product->category['slug'],$product->id])}}">{{$product->name}}</a>
<h2>{{$product->price}}</h2>
<p>{{$product->description}}</p>
<h2>Осталось: {{$product->quantity}}</h2>
@if($product->available == True)
<h2>YES</h2>
@else
<h2>No</h2>
@endif
@if($product->images->count()>0)
@for ($i = 0; $i < $product->images->count(); $i++)
<img src="{{asset('storage')}}/{{$product->images[$i]['img']}}" alt="">
@endfor
@else
<img src="{{asset('storage')}}/public/images/no_image.png" alt="">
@endif
@endforeach
@endsection
