@extends('home')

@section('judul', 'Forum')

@section('isikontentuser')

  <div class="uk-card uk-card-default uk-card-body uk-width-4-5@m uk-align-center">
    <a class="uk-margin-small-left ngobrol" uk-icon="icon: reply; ratio: 2" href="{{ route('wellcome') }}"></a>
    @if (Session::has('create'))

          <div class="uk-alert-success" uk-alert>
             <a class="uk-alert-close" uk-close></a>
             <p>Upload :  {{ Session::get('create') }}</p>
         </div>
      @endif


    <div>
        <div class="uk-card uk-card-default uk-margin-large-top uk-width-3-5@m uk-align-center">
          {!! Form::open(array('route' => 'home.upload.submit', 'files' => true)) !!}


              {{ Form::label('img_galleri', 'Upload to Gallery ')}}
              {{ Form::file('img_galleri') }}
              <br>
              {{ Form::label('description', 'Description') }}
              {{ Form::textarea('description', null, array('class' => 'uk-textarea')) }}
              <br>
              {{ Form::submit('Upload', array('class' => 'uk-button uk-button-success uk-width-3-5@m uk-align-center')) }}
          {!! Form::close() !!}


  </div>
</div>
</div>

@endsection
