@extends('layouts.main')

@section('title','Products')
@section('content')
<h1>Create nwe product</h1>

<form action="{{route('product.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <label for="ProductName"></label>
    <input type="text" id="ProductName" name="name" placeholder="Enter product name" required>
    <label for="ProductSlug"></label>
    <input type="text" id="ProductDescription" name="description" placeholder="Enter product description" required>
    <label for="ProductDescription"></label>
    <input type="number" id="ProductPrice" name="price" placeholder="Enter product price" required>
    <label for="ProductQuantity"></label>
    <input type="number" id="ProductQuantity" name="quantity" placeholder="Enter product quantity" required>
    <input type="number" id="ProductCategoryID" name="category_id" placeholder="Enter category id" required>
    <input type="radio" id="ProductAvilable1"
     name="available" value="1" >
    <label for="ProductAvilable1">True</label>
    <input type="radio" id="ProductAvilable2"
     name="available" value="0 ">
    <label for="ProductAvilable2">False</label>
    <input type="file" name="images[]" multiple>
    <button type="submit">Create</button>

</form>
@endsection