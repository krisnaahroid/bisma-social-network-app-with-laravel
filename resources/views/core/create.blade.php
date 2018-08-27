@extends('master')

@section('title', 'Creat new post')

@section('kontent')
  @include('inc.featurepost')
<div class="col-md-6 col-md-offset-4">
  @if (Session::has('create'))
        <div class="alert alert-success alert-dismissible" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <strong>Success!</strong> {{ Session::get('create') }}
        </div>
    @endif
</div>
    <div class="" style="top:50px;position:relative;">
      <div class="col-md-6 col-md-offset-4" style="margin-bottom:100px;">
        <button type="button" class="btn btn-primary btn-block btn-h1-spacingne" name="button"><a style="color:white;text-decoration:none;" href="{{ route('categorys.index') }}">Create New Category</a></button>
<hr>
        <h1 class="text-center">~ Create New Post to Our Blog ~</h1>
        <hr>
        {{-- <form class="" role="form" action="index.html" method="post">
          <div class="form-group">
						<label>Title</label>
						<input class="form-control" placeholder="...">
					</div>
          <div class="form-group">
						<label>Description</label>
						<textarea class="form-control" rows="3" style="margin: 0px -1px 0px 0px; width: 100%; height: 125px;"></textarea>
					</div>
          <button type="submit" class="btn btn-primary col-md-12">Create</button>
        </form> --}}
        {!! Form::open(array('route' => 'admin.create.post.submit')) !!}
            {{ Form::label('title', 'Title') }}
            {{ Form::text('title', null, array('class' => 'form-control')) }}

            {{ Form::label('slug', 'Slug:') }}
            {{ Form::text('slug', null, array('class' => 'form-control', 'required' => '', 'minlength' => '5', 'maxlength' => '255') ) }}

            {{ Form::label('category_id', 'Category:') }}
          				<select class="form-control" name="category_id">
          					@foreach($categories as $category)
          						<option value='{{ $category->id }}'>{{ $category->name }}</option>
          					@endforeach

          				</select>

            {{ Form::label('body', 'Post Content') }}
            {{ Form::textarea('body', null, array('class' => 'form-control')) }}
            <br>
            {{ Form::submit('Create', array('class' => 'btn btn-success btn-lg btn-block')) }}
        {!! Form::close() !!}
      </div>

    </div>

@endsection
