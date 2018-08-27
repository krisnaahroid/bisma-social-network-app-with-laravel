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
        <h1>Gallery Management</h1>
        <hr>
        {!! Form::open(array('route' => 'admin.create.gallery.submit', 'files' => true)) !!}

            {{ Form::label('img_galleri', 'Upload to Gallery ')}}
            {{ Form::file('img_galleri') }}
<br>
            {{ Form::label('description', 'Description') }}
            {{ Form::textarea('description', null, array('class' => 'form-control')) }}
            <br>
            {{ Form::submit('Create', array('class' => 'btn btn-success btn-lg btn-block')) }}
        {!! Form::close() !!}
      </div>
    </div>

<div class="col-md-10 col-md-offset-2" style="position:relative;top:50px;margin-bottom:50px;">
  <table class="table table-hover table-bordered ">
        <thead>
          <tr>
            <th>Images</th>
            <th>Description</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($galleris as $galleri)
            <tr>
              <td>{{ $galleri->image }}</td>
              <td>{!! str_limit($galleri->description, 80) !!}</td>
              <td style='white-space: nowrap'>
                  <a class="btn btn-danger" href="{{ route('admin.create.gallery.delete', ['id' => $galleri->id ]) }}" role="button">Delete</a> |
                  <a class="btn btn-success" href="{{ route('show.jurusan', ['id' => $galleri->id])}}" target="_blank" role="button">Preview</a>
              </td>
            </tr>
          @endforeach

        </tbody>
      </table>
</div>
@endsection
