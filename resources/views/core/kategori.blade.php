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

                <hr>
                {!! Form::open(['route' => 'categorys.store', 'method' => 'POST']) !!}
                	<h2>Create New Category</h2>
                	{{ Form::label('name', 'Name:') }}
                	{{ Form::text('name', null, ['class' => 'form-control']) }}
<br>
                	{{ Form::submit('Create New Category', ['class' => 'btn btn-primary btn-block btn-h1-spacing']) }}

                {!! Form::close() !!}

              </div>
            </div>

        <div class="col-md-6 col-md-offset-4" style="position:relative;top:50px;margin-bottom:50px;">
          <table class="table table-hover table-bordered ">
                <thead>
                  <tr>
                    <th>Id</th>
                    <th>Category</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>

                    @foreach ($categories as $category)
                    <tr>
                      <th scope="row">{{ $category->id}}</th>
                      <td>{{ $category->name }}</td>
                      <td>
                          <center><a class="btn btn-danger" href="{{ route('categorys.destroy', ['id' => $category->id])}}" role="button">Delete</a></center>
                      </td>
                    </tr>
                    @endforeach

                </tbody>
              </table>
        </div>
        @endsection
