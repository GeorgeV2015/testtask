@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-8">

            <h1 class="my-4">{{ $title }}</h1>

            @if($comments->count() === 0)
                <p class="lead">There are no comments yet</p>
            @endif
        <!-- Blog Post -->
            @foreach($comments as $comment)
                <div class="card mb-4">
                    <h5 class="card-header text-white bg-primary">{{ $comment->name }}</h5>
                    <div class="card-body">
                        <div class="card-body">{{ $comment->text }}</div>
                    </div>
                </div>
            @endforeach

            {{ $comments->links() }}

            <div class="card my-4">
                <h5 class="card-header">Leave a Comment:</h5>
                <div class="card-body">
                    @include('admin.partials.errors')
                    <form action="/comments" method="post">
                        {{ csrf_field() }}
                        {{ method_field('POST') }}
                        @if (\Auth::check())
                            <input type="text" class="form-control" id="name" name="name" value="{{ \Auth::user()->name }}" hidden>
                            <input type="text" class="form-control" id="email" name="email" value="{{ \Auth::user()->email }}" hidden>
                        @else
                            <div class="form-group">
                                <label for="name">Your name:</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
                            </div>
                            <div class="form-group">
                                <label for="email">Your email:</label>
                                <input type="text" class="form-control" id="email" name="email" value="{{ old('email') }}">
                            </div>
                        @endif
                        <div class="form-group">
                            <label for="text">Your Comment:</label>
                            <textarea name="text" id="text" cols="30" rows="6" class="form-control">{{ old('text') }}</textarea>
                        </div>
                        <button class="btn btn-primary" type="submit">Add Comment</button>
                    </form>
                    {{--{!! Form::open(['route' => 'comment']) !!}
                    {{ Form::textareaField('text', ' ', old('text'), ['rows' => 3, 'placeholder' => 'Write your comment...']) }}
                    {{ Form::submit('Add Comment', ['class' => 'btn btn-primary']) }}
                    {!! Form::close() !!}--}}
                </div>
            </div>

        </div>

        <!-- Sidebar Widgets Column -->
        @include('partials.sidebar')
    </div>

@endsection