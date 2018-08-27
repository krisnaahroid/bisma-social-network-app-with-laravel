@extends('home')

@section('judul', 'Knowledge++')


@section('isikontentuser')
  <div class="uk-card uk-card-default uk-card-body uk-width-5-6@m uk-align-center">
    <a class="uk-margin-small-left ngobrol" uk-icon="icon: reply; ratio: 2" href="{{ route('home.info') }}"></a>

    @include('/inc/list-belajar')

<br>

<div class="uk-divider-icon">

</div>
<br>

<h1>{{ $post->title }}</h1>
<p>{!! $post->body !!}</p>
<strong>posted by : {{ $post->category->name }}</strong>
<hr>
<em>{{ route('info.single', $post->slug) }}</em>
</div>
@endsection
