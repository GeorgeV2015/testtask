@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-8">

            <h1 class="my-4">{{ $title }}</h1>

            @if($news->count() === 0)
                <p class="lead">There are no news yet</p>
            @endif
        <!-- Blog Post -->
            @foreach($news as $newsItem)
                <div class="card mb-4">
                    @if ($newsItem->hasImage())
                        <img class="card-img-top" src="{{ url($newsItem->image['normal']) }}" alt="{{ $newsItem->title }}">
                    @endif
                    <div class="card-body">
                        <h2 class="card-title">{{ $newsItem->title }}</h2>
                        <a href="{{ route('news.show', [$newsItem->slug]) }}"
                           class="btn btn-primary">Read More &rarr;</a>
                    </div>
                </div>
            @endforeach

            <div class="d-flex justify-content-center">
                {{ $news->links() }}
            </div>

        </div>

        <!-- Sidebar Widgets Column -->
        @include('partials.sidebar')
    </div>

@endsection