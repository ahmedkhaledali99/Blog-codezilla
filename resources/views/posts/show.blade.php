
@extends('layouts.app')
@section('title')show @endsection
@section('content')


<div class="container">

    <div class="card mt-4">
        <h5 class="card-header">post info </h5>
        <div class="card-body">
            <h5 class="card-title">Title :{{$post->title}}</h5>
            <p class="card-text">Description :{{$post->description}} </p>
        </div>
    </div>
    <div class="card">
        <h5 class="card-header">post creator info </h5>
        <div class="card-body">
            <h5 class="card-title">Name : {{ $post->user ? $post->User->name: "User not found" }}</h5>
            <p class="card-text">Email : {{ $post->Email ? $post->user->email :"Emaill not found" }}</p>
            <p class="card-text">Creat At : {{ $post->created_at }}</p>
        </div>
    </div>

</div>
<br>


@endsection
