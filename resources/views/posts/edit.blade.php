
@extends('layouts.app')
@section('title')edit @endsection
@section('content')

<br>
<form action="{{ route('posts.update',$post->id) }}" method="POST">

@csrf
@method('put')

    <div class="mb-3">
        <label  class="form-label" >Title</label>
        <input name="title" value="{{ $post->title }}" type="text" class="form-control" >
    </div>

    <div class="mb-3">
        <label  class="form-label">Description</label>
        <textarea name="description" class="form-control"  rows="3">{{ $post->description }}</textarea>
    </div>

    <div class="mb-3">
        <label  class="form-label">Post creator</label>
       <select name="post_creator" id="">

       @foreach ($users as $user)

        <option @selected($post->user_id == $user->id) value="{{ $user->id }}">{{ $user->name }}</option>

        @endforeach

       </select>
    </div>

      <button  class="btn btn-primary">Update</button>

</form>

@endsection
