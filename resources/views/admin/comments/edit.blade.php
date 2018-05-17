@extends('admin.layout')

@section('content')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Comments</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <div class="row">
            <div class="col-lg-12">
                @include('admin.partials.errors')
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        Edit Comments
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-8">
                                <form action="/admin/comments/{{ $comment->id }}" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    {{ method_field('PUT') }}
                                    <div class="form-group">
                                        <label for="name">User Name:</label>
                                        <input type="text" class="form-control" id="name" name="name" value="{{ $comment->name }}" disabled="disabled">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email:</label>
                                        <input type="text" class="form-control" id="email" name="email" value="{{ $comment->email }}" disabled="disabled">
                                    </div>

                                    <div class="form-group">
                                        <label for="text">Text:</label>
                                        <textarea name="text" id="text" cols="30" rows="10" class="form-control">{{ $comment->text }}
                                        </textarea>
                                    </div>
                                    <a href="{{ route('comments.index') }}" class="btn btn-default">Back</a>
                                    <button class="btn btn-primary" type="submit">Update Comment</button>
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