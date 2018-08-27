@extends('main')

@section('title', 'Gallery')

@section('kontent')
  <div class="uk-card uk-card-default uk-card-body uk-width-5-5@m uk-align-center">
    <a class="uk-margin-small-left ngobrol" uk-icon="icon: reply; ratio: 2" href="{{ route('wellcome') }}"></a>

  <div class="uk-child-width-1-3@m uk-margin-large-top" uk-grid uk-scrollspy="cls: uk-animation-fade; target: > div > .uk-card; delay: 500; repeat: true">

  @foreach ($galleris as $galleri)
    <div>
      <div class="uk-card uk-card-default">
          <div class="uk-card-media-top">
              <img src="{{ asset('/gallery/'.$galleri->image)}}" alt="">
          </div>

          <div class="uk-card-footer">
              <p>{!! $galleri->description !!}</p>
          </div>
      </div>
  </div>
  @endforeach

  </div>


    {{ $galleris->render() }}

</div>
@endsection
