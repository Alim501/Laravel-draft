@extends('layouts.main')

@section('title','Products')
@section('content')
<h1>{{$product->name}}</h1>
<h2>{{$product->price}}</h2>
<p>{{$product->description}}</p>
<h1>{{$product->category['name']}}</h1>
<h2>Осталось: {{$product->quantity}}</h2>
    @if($product->available == True)
        <h2>YES</h2>
    @else
        <h2>No</h2>
    @endif
@foreach($product->images as $image)
<img src="/images/{{$image->img}}" alt="">
@endforeach