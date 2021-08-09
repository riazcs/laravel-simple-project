@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                     <?php 
                     if(Auth::user()->role_id == 1){ ?>
                    <div class="pull-right">
                            <a class="btn btn-success" href="{{ route('posts.create') }}"> Create New Post</a>
                    </div>
                    <?php } ?>
                    <?php 
                     if(Auth::user()->role_id == 10){ ?>
                    <div class="pull-right">
                            <a class="btn btn-success" href="{{ route('posts.index') }}"> Create New Product</a>
                    </div>
                    <?php } ?>
            </div>
        </div>
    </div>
</div>
@endsection
