@extends('layouts.app')
@section('content')
 <div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 mx-4 px-4">
            <div class="text-center">
                <h2>Post CRUD</h2>
            </div>
            <?php 
             if(Auth::user()->role_id == 1){ ?>
            <div class="float-right mb-2 mr-3">
                <a class="btn btn-success" href="{{ route('posts.create') }}"> Create New Post</a>
            </div>
           <?php } ?>
        </div>
    </div>
    
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
     
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Title</th>
            <th>Description</th>
            <th>File</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($posts as $post)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $post->title }}</td>
            <td>{{ $post->descr }}</td>
            <td><img src="/image/{{ $post->file }}" width="100px"></td>
            <td>
                <form action="{{ route('posts.destroy',$post->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('posts.show',$post->id) }}">Show</a>
                    <?php 
                    if(Auth::user()->role_id == 1){ ?> <a class="btn btn-primary" href="{{ route('posts.edit',$post->id) }}">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button> <?php } ?>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
     <div class="float-right">{!! $posts->links() !!}</div>
    </div>
        
@endsection