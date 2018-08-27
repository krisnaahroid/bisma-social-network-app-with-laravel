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

        <h1 class="text-center">~ Create a News ~</h1>
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
        {!! Form::open(array('route' => 'admin.create.news.submit')) !!}
            {{ Form::label('title', 'Title') }}
            {{ Form::text('title', null, array('class' => 'form-control')) }}

            {{ Form::label('slug', 'Slug:') }}
            {{ Form::text('slug', null, array('class' => 'form-control', 'required' => '', 'minlength' => '5', 'maxlength' => '255') ) }}

            {{ Form::label('body', 'Post Content') }}
            {{ Form::textarea('body', null, array('class' => 'form-control')) }}
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
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($berita as $beritaa)
                <tr>
                  <th scope="row">{{ $beritaa->title }}</th>
                  <td>{!! str_limit($beritaa->body, 150) !!}</td>

                  <td style='white-space: nowrap'>
                      <a class="btn btn-danger" href="{{ route('admin.create.news.delete', ['id' => $beritaa->id ]) }}" role="button">Delete</a> |
                      <a class="btn btn-success" href="{{ route('show.jurusan', $beritaa->slug) }}" target="_blank" role="button">Preview</a>
                  </td>
                </tr>
              @endforeach

            </tbody>
          </table>
          <br>
          <div class="text-center">
          {{ $berita->links() }}
          </div>
    </div>

@endsection
