@extends('layout.master')

@section('title', 'Add Item Page')

@section('content')

@include('components.navbar')

<form class="p-5 w-50" action="{{ route('add.item') }}" method="POST" enctype="multipart/form-data">
   @csrf
  <div class="mb-3">
    <label  class="form-label">Item Name</label>
    <input type="text" class="form-control @error('name') is-invalid @enderror"  value="{{ old('name') }}" name="name">
  </div>

  <div class="mb-3">
    <label class="form-label">Item Description</label>
    <input type="text" class="form-control @error('description') is-invalid @enderror"  value="{{ old('description') }}"  name="description">
  </div>

  <div class="mb-3">
    <label class="form-label">Item Stock</label>
    <input type="number" class="form-control @error('stock') is-invalid @enderror" value="{{ old('stock') }}" name="stock">
  </div>

  <div class="mb-3">
    <label for="formFile" class="form-label">Item Image</label>
    <input class="form-control @error('image') is-invalid @enderror" type="file" id="formFile" name="image">
  </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection