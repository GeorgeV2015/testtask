@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-8">

            <!-- Title -->
            <h1 class="mt-4 mb-4 text-center">{{ $news->title }}</h1>

        @include('admin.partials.errors')

        <!-- Author -->
            <!-- Preview Image -->
            @if ($news->hasImage())
                <img class="img-fluid rounded" src="{{ url($news->image['normal']) }}" alt="{{ $news->title }}">
            @endif

            <hr>

            <!-- Post Content -->
            <div>
                {!! $news->content !!}
            </div>

            <hr>
            <a href="{{ route('news') }}" class="btn btn-primary mb-4">Back</a>
        </div>
        <!-- Sidebar Widgets Column -->
        @include('partials.sidebar')
    </div>

@endsection
