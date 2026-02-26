@extends('layout.master')

@section('title', 'Register Page')

@section('content')
<section style="padding: 100px;">

    <h1>
        Login  Form
    </h1>

    @error('message')
        <h4>
            {{$message}}
        </h4>
    @enderror

    <form action="/login" method="POST">
        @csrf
         <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email">
            @error('email') 
                <p class="">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password">
        </div>
        @error('password') 
                <p class="">{{ $message }}</p>
         @enderror
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</section>

@endsection