@extends('layouts.main')

@section('title','Products')
@section('content')
<h1>Create nwe categroy</h1>

<form action="{{route('category.store')}}" method="POST">
    @csrf
    <label for="CategoryName"></label>
    <input type="text" id="CategoryName" name="name" placeholder="Enter category name" required>
    <label for="CategorySlug"></label>
    <input type="text" id="CategorySlug" name="slug" placeholder="Enter category slug" required>
    <button type="submit">Create</button>

</form>
@endsection