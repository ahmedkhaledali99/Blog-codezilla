
@extends('layouts.app')
@section('title')create @endsection
@section('content')


@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


<br>

<form action="{{ route('posts.store') }}"  method="POST">

@csrf

    <div class="mb-3">
        <label  class="form-label" >Title</label>
        <input name="title" type="text" class="form-control"  value="{{ old('title') }}">
    </div>

    <div class="mb-3">
        <label  class="form-label">Description</label>
        <textarea name="description" class="form-control"  rows="3" value={{ old('decsription') }}></textarea>
    </div>

    <div class="mb-3">
        <label  class="form-label">post creator</label>
       <select name="post_creator" id="">

        @foreach ($users as $user)

        <option value="{{ $user->id }}">{{ $user->name }}</option>

        @endforeach

       </select>
    </div>
      <button  class="btn btn-success">Submit</button>

</form>

@endsection
