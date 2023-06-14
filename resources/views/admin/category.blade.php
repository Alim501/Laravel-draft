@extends('layouts.main')

@section('title','Products')
@section('content')
@if(session('success'))
<h1>{{session('success')}}</h1>
@endif
<h1>{{$categories->count()}} </h1>
@foreach ($categories as $category)
<h1>{{$category->name}}</h1>
<h1>{{$category->slug}}</h1>
<h1>{{$category->created_at}}</h1>
<h1>{{$category->updated_at}}</h1>
<br>

@endforeach
@endsection