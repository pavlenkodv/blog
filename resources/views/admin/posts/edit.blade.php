@extends('admin.layout')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Edit post
        <small>pleasant words..</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
    {{Form::open([
        'route'	=>	['posts.update', $post->id],
        'files'	=>	true,
        'method'	=>	'put'
    ])}}
    <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Any notification about the formats ..</h3>
          @include('admin.errors')
        </div>
        <div class="box-body">
          <div class="col-md-6">
            <div class="form-group">
              <label for="exampleInputEmail1">Name</label>
              <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" value="{{$post->title}}" name="title">
            </div>

            <div class="form-group">
              <img src="{{$post->getImage()}}" alt="" class="img-responsive" width="200">
              <label for="exampleInputFile">Post Image</label>
              <input type="file" id="exampleInputFile" name="image">

              <p class="help-block">Edit post..</p>
            </div>
            <div class="form-group">
              <label>Category</label>
              {{Form::select('category_id',
              	$categories,
                $post->getCategoryID(),
              	['class' => 'form-control select2'])
              }}
            </div>
            <div class="form-group">
              <label>Tags</label>
              {{Form::select('tags[]',
              	$tags,
              	$selectedTags,
              	['class' => 'form-control select2', 'multiple'=>'multiple','data-placeholder'=>'Выберите теги'])
              }}
            </div>
            <!-- Date -->
            <div class="form-group">
              <label>Дата:</label>

              <div class="input-group date">
                <div class="input-group-addon">
                  <i class="fa fa-calendar"></i>
                </div>
                <input type="text" class="form-control pull-right" id="datepicker" value="{{$post->date}}" name="date">
              </div>
              <!-- /.input group -->
            </div>

            <!-- checkbox -->
            <div class="form-group">
              <label>
                {{Form::checkbox('is_featured', '1', $post->is_featured, ['class'=>'minimal'])}}
              </label>
              <label>
                Recomend
              </label>
            </div>
            <!-- checkbox -->
            <div class="form-group">
              <label>
                {{Form::checkbox('status', '1', $post->status, ['class'=>'minimal'])}}
              </label>
              <label>
                Draft
              </label>
            </div>
          </div>
          <div class="col-md-12">
            <div class="form-group">
              <label for="exampleInputEmail1">Short description</label>
              <textarea name="description" id="" cols="30" rows="10" class="form-control" >{{$post->description}}</textarea>
            </div>
          </div>
          <div class="col-md-12">
            <div class="form-group">
              <label for="exampleInputEmail1">Full text</label>
              <textarea name="content" id="" cols="30" rows="10" class="form-control">{{$post->content}}</textarea>
            </div>
          </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          <button class="btn btn-warning pull-right">Edit</button>
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->
      {{Form::close()}}
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection