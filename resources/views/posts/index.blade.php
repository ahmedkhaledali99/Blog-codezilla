
@extends('layouts.app')
@section('title')index @endsection
@section('content')





<div class="container mt-4">
    <div class="text-center">
        <a href={{ route('posts.create') }} type="button" class="btn btn-success">Create Post</a>

    </div>
</div>
<br>
<table class="table" mt-4>
  <thead>
    <tr>
      <th scope="col">Serial</th>
      <th scope="col">title</th>
      <th scope="col">Posted By</th>
      <th scope="col">Create At</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($posts as $post )

    <tr>
        <td>{{ $post->id }}</td>
        <td>{{ $post->title }}</td>
        <td>{{ $post->user ? $post->User->name: "User not found" }}</td>
        <td>{{ $post->created_at->format('y-m-d') }}</td>
        <td>
            <a href = "{{ route('posts.show',$post->id ) }}" type="button" class="btn btn-info">view</a>
            <a href =" {{ route('posts.edit',$post->id ) }}" type="button" class="btn btn-primary">Edit</a>

            <form  onsubmit="return confirm('Are you sure you want to delete this post?');"  style="display:inline;" action={{ route('posts.destroy',$post->id ) }} method="POST" >
                @csrf
                @method('Delete')

                <button type="submit"   class="btn btn-danger">Delete</button>
            </form>

        </td>
    </tr>
    @endforeach



</tbody>
</table>

@endsection
