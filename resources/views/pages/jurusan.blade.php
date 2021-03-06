@extends('main')

@section('title', 'Wellcome')

@section('kontent')

  <div class="uk-card uk-card-default uk-card-body uk-width-4-5@m uk-align-center">
    <a class="uk-margin-small-left ngobrol" uk-icon="icon: reply; ratio: 2" href="{{ route('wellcome') }}"></a>
    <div>
        <div class="uk-card uk-card-default">
            <div class="uk-card-media-top">
                <img class="uk-align-center" src="{!! url('/images/'.$jurusan->image) !!}" alt="{{ $jurusan->title }}">
            </div>
            <div class="uk-card-body">
                <h3 class="uk-card-title">{{ $jurusan->title }}</h3>
                <p>{!! $jurusan->content  !!}</p>
            </div>
        </div>
    </div>
</div>


@endsection
