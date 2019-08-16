@extends('admin.layout')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        All posts
        <small>it all starts here</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="/"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="/admin">Admin</a></li>
        <li class="active">Posts</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Posts list</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="form-group">
            <a href="{{route('posts.create')}}" class="btn btn-success">Add Post</a>
          </div>
          <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Category</th>
              <th>Tags</th>
              <th>Image</th>
              <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($posts as $post)
              <tr>
                <td>{{$post->id}}</td>
                <td>{{$post->title}}</td>
                <td>{{$post->getCategoryTitle()}}</td>
                <td>{{$post->getTagsTitles()}}</td>
                <td>
                  <img src="{{$post->getImage()}}" alt="" width="100">
                </td>
                <td>
                  <a href="{{route('posts.edit', $post->id)}}" class="fa fa-pencil"></a>
                  {{Form::open(['route'=>['posts.destroy', $post->id], 'method'=>'delete'])}}
                  <button onclick="return confirm('are you sure?')" type="submit" class="delete">
                    <i class="fa fa-remove"></i>
                  </button>
                  {{Form::close()}}
                </td>
              </tr>
            @endforeach
            </tfoot>
          </table>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection