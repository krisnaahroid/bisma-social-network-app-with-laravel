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

    @if (Session::has('success'))
          <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong>Success!</strong> {{ Session::get('success') }}
          </div>
      @endif
</div>
    <div class="" style="margin-top:50px;">
      <div class="col-md-6 col-md-offset-4">
        <h1>Create New Post - Facultys</h1>
        <hr>
        {!! Form::open(array('route' => 'admin.create.faculty.submit', 'files' => true)) !!}
        {{ csrf_field() }}
            {{ Form::label('title', 'Title') }}
            {{ Form::text('title', null, array('class' => 'form-control')) }}
<br><br>
            {{ Form::label('img_jurusan', 'Upload Gambar Jurusan')}}
            {{ Form::file('img_jurusan') }}
<br>
            {{ Form::label('slug', 'Slug:') }}
            {{ Form::text('slug', null, array('class' => 'form-control', 'required' => '', 'minlength' => '5', 'maxlength' => '255') ) }}
<br>
            {{ Form::label('content', 'Post Content') }}
            {{ Form::textarea('content', null, array('class' => 'form-control')) }}
            <br>
            {{ Form::submit('Create', array('class' => 'btn btn-success btn-lg btn-block')) }}
        {!! Form::close() !!}
      </div>
    </div>

<div class="col-md-10 col-md-offset-2" style="position:relative;top:50px;margin-bottom:50px;">
  <table class="table table-hover table-bordered ">
        <thead>
          <tr>
            <th>Title</th>
            <th>Content</th>
            <th>Images</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($jurusan as $skill)
            <tr>
              <th scope="row">{{ $skill->title }}</th>
              <td>{!! str_limit($skill->content, 300) !!}</td>
              <td>{{ $skill->image }}</td>
              <td style='white-space: nowrap'>
                  <a class="btn btn-danger" href="{{ route('admin.create.faculty.delete', ['id' => $skill->id ]) }}" role="button">Delete</a> |
                  <a class="btn btn-success" href="{{ route('show.jurusan', $skill->slug) }}" target="_blank" role="button">Preview</a>
              </td>
            </tr>
          @endforeach

        </tbody>
      </table>
</div>
@endsection
