@extends('home')

@section('judul', 'Knowledge++')


@section('isikontentuser')
  <div class="uk-card uk-card-default uk-card-body uk-width-5-6@m uk-align-center">
    <a class="uk-margin-small-left ngobrol" uk-icon="icon: reply; ratio: 2" href="{{ route('wellcome') }}"></a>

    @include('/inc/list-belajar')



<br>

<div class="uk-divider-icon">

</div>
<br>

@foreach ($posts as $post)
  <div class="uk-card uk-card-default uk-width-5-6@m uk-align-center">
      <div class="uk-card-header">
          <div class="uk-grid-small uk-flex-middle" uk-grid>
              <div class="uk-width-expand">
                  <h3 class="uk-card-title uk-margin-remove-bottom">{{ $post->title }}</h3>
                  <p class="uk-text-meta uk-margin-remove-top"><time datetime="2016-04-01T19:00">{{ $post->created_at }}</time></p>
              </div>
          </div>
      </div>
      <div class="uk-card-body">
          <p>{!! str_limit($post->body, 300) !!}</p>
      </div>
      <div class="uk-card-footer">
          <a href="{{ route('info.single', $post->slug) }}" class="uk-button uk-button-text">Read more</a>
      </div>
  </div>
@endforeach

{{ $posts->links() }}
</div>
@endsection
