@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add Blog</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form action="{{route('store')}}" enctype="multipart/form-data" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="title" class="form-label">Enter Title</label>
                            <input type="text" class="form-control" id="title" placeholder="Enter Title" name="title">
                        </div>
                        <div class="mb-3">
                            <label for="body" class="form-label">What's on your mind?</label>
                            <textarea class="form-control" id="body" rows="8" name="body"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="img" class="form-label">Upload Image</label>
                            <input class="form-control" id="img" type="file" name="img">
                        </div>
                        <div class="mb-3">
                            <button type="submit" role="submit" class="btn btn-dark w-100">Add</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

</div>
@endsection