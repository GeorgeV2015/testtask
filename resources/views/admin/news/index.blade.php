@extends('admin.layout')

@section('content')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Posts</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <div class="row">
            <div class="col-lg-12">
                @include('admin.partials.errors')
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        News List
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <p>
                            <a href="{{ route('news.create') }}" class="btn btn-primary">Add News</a>
                        </p>
                        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTable">
                            <thead>
                            <tr>
                                <th class="text-center">ID</th>
                                <th class="text-center">Title</th>
                                <th class="text-center">Image</th>
                                <th class="text-center">Edit</th>
                                <th class="text-center">Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($news as $newsItem)
                                <tr class="odd gradeX">
                                    <td>{{ $newsItem->id }}</td>
                                    <td>{{ $newsItem->title }}</td>
                                    <td class="text-center">
                                        <img src="{{ url($newsItem->image['min']) }}" alt="{{ $newsItem->title }}" class="image-responsive" width="150">
                                    </td>
                                    <td class="text-center">
                                        <a href="{{ route('news.edit', $newsItem->slug) }}" class="fa fa-pencil"></a>
                                    </td>
                                    <td class="text-center">
                                        <form action="/admin/news/{{ $newsItem->slug }}" method="POST">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button class="fa fa-remove delete"
                                                    type="submit">
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <!-- /.table-responsive -->
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