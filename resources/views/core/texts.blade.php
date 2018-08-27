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
        <h1 class="text-center">~ Post to Wellcome Page ~</h1>
        <hr>

        {!! Form::open(array('route' => 'admin.advance.store')) !!}

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
                <th>Content</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($advances as $text)
                <tr>
                  <td>{!! $text->body !!}</td>
                  <td style='white-space: nowrap'>
                      <a class="btn btn-danger" href="{{ route('admin.advance.delete', ['id' => $text->id ]) }}" role="button">Delete</a> |
                      <a class="btn btn-success" href="{{ route('wellcome') }}" target="_blank" role="button">Preview</a>
                  </td>
                </tr>
              @endforeach

            </tbody>
          </table>
    </div>
@endsection
