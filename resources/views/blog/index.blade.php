@extends('layouts.app')

@section('content')
<div class="container">
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">My Blogs</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="row">
                        @foreach ($blogs as $blog)
                            <div class="col-4 md-5">
                                <div class="card mt-2 md-5 ">
                                    <img src="{{asset($blog->img)}}" class="card-img-top" height="250" alt="">
                                    <div class="card-body">
                                        <h5 class="card-title">{{$blog->title}}</h5>
                                        <p class="card-text">{{$blog->body}}</p>
                                    </div>
                                    <div class="row justify-content-between card-body">
                                        <a href="{{route('edit', ['id' => $blog->id])}}" class="card-link col-3"><i
                                                class="fa-solid fa-pen-to-square"></i></a>
                                        <a href="{{route('archive', ['id' => $blog->id])}}" class="card-link col-2"><i
                                                class="fa-solid fa-box-archive"></i></a>

                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
