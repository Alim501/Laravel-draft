@extends('layouts.main')

@section('title','Products')
@section('content')
<h1>Edit product</h1>

<form action="{{route('product.update',$product->id)}}" method="POST">
    @csrf
    @method('PUT')
    <label for="ProductName"></label>
    <input type="text" id="ProductName" name="name" placeholder="Enter product name" required value="{{$product->name}}">
    <label for="ProductSlug"></label>
    <input type="text" id="ProductDescription" name="description" placeholder="Enter product description" required value="{{$product->description}}">
    <label for="ProductDescription"></label>
    <input type="number" id="ProductPrice" name="price" placeholder="Enter product price" required value="{{$product->price}}">
    <label for="ProductQuantity"></label>
    <input type="number" id="ProductQuantity" name="quantity" placeholder="Enter product quantity" required value="{{$product->quantity}}">
    <input type="number" id="ProductCategoryID" name="category_id" placeholder="Enter category id" required value="{{$product->category['slug']}}">
    <input type="radio" id="ProductAvilable1"
     name="available" value="1"   
     @if($product->available == 1)
        checked
    @endif>
    <label for="ProductAvilable1">True</label>
    <input type="radio" id="ProductAvilable2"
     name="available" value="0 " 
     @if($product->available == 0)
        checked
    @endif>
    <label for="ProductAvilable2">False</label>
    <button type="submit">Create</button>

</form>
<form action="{{route('product.destroy',$product->id)}}" method="POST">
    @csrf
    @method('DELETE')
    <button type="submit">Delete</button>
</form>
@endsection