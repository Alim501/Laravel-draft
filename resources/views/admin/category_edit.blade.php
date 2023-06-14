@extends('layouts.main')

@section('title','Products')
@section('content')
<h1>Create nwe categroy</h1>

<form action="{{route('category.update',$category->id)}}" method="POST">
    @csrf
    @method('PUT')
    <label for="CategoryName"></label>
    <input type="text" id="CategoryName" name="name" placeholder="Enter category name" value="{{$category->name}}" required>
    <label for="CategorySlug"></label>
    <input type="text" id="CategorySlug" name="slug" placeholder="Enter category slug" value="{{$category->slug}}" required>
    <button type="submit">Create</button>

</form>
<form action="{{route('category.destroy',$category->id)}}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit">Delete</button>
</form>
@endsection