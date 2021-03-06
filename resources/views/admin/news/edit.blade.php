@extends('admin.layout')

@section('content')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">News</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <div class="row">
            <div class="col-lg-12">
                @include('admin.partials.errors')
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        Edit News
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-8">
                                <form action="/admin/news/{{ $news->slug }}" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    {{ method_field('PUT') }}
                                    <div class="form-group">
                                        <label for="title">Title:</label>
                                        <input type="text" class="form-control" id="title" name="title" value="{{ $news->title }}">
                                    </div>
                                    <div class="form-group" id="image-preview">
                                        <label for="image-upload" id="image-label">Choose file</label>
                                        <input type="file" name="image" id="image-upload" data-image="{{ $news->image['normal'] }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="content">Content:</label>
                                        <textarea name="content" id="content" cols="30" rows="10" class="form-control">{{ $news->content }}
                                        </textarea>
                                    </div>
                                    <a href="{{ route('news.index') }}" class="btn btn-default">Back</a>
                                    <button class="btn btn-primary" type="submit">Update News</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /#page-wrapper -->
@endsection