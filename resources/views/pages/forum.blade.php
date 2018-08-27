@extends('home')

@section('judul', 'Forum')

@section('isikontentuser')

  <div  class="uk-container uk-container-small uk-box-shadow-small uk-margin-large-top">
{{-- @include('inc.pesan-error') --}}
<a class="uk-margin-small-left ngobrol uk-margin-medium-top" uk-icon="icon: reply; ratio: 2" href="{{ route('wellcome') }}"></a>
<br>
@if (Session::has('dangerr'))
    <div class="uk-alert-danger uk-margin-smal-top" uk-alert>
       <a class="uk-alert-close" uk-close></a>
       <p> {{ Session::get('dangerr') }} </p>
   </div>
@endif
@if (Session::has('success'))
    <div class="uk-alert-success uk-margin-smal-top" uk-alert>
       <a class="uk-alert-close" uk-close></a>
       <p> {{ Session::get('success') }} </p>
   </div>
@endif
  @if (Session::has('info'))
      <div class="uk-alert-success uk-margin-smal-top" uk-alert>
         <a class="uk-alert-close" uk-close></a>
         <p> {{ Session::get('info') }} </p>
     </div>
  @endif

  @if ($errors->has('status'))
    <div class="uk-alert-warning" uk-alert>
      <a class="uk-alert-close" uk-close></a>
      <p>{{ $errors->first('status')}}</p>
  </div>
  @endif

      <form action="{{ route('home.status.post') }}" method="post">
          {{ csrf_field() }}

        <div class="uk-margin-medium-top {{ $errors->has('status') ? 'has-error' : '' }}" >
            <textarea class="uk-textarea" rows="5" name="status" placeholder="What's up {{ Auth::user()->name }}"></textarea>
        </div>

        <div class="uk-margin">
          <button class="uk-button uk-width-1-1 uk-margin-small-bottom" type="submit" style="background-color:#b6e2ff;font-weight:bold;font-size:22px;">Update Status Yukkk !</button>
        </div>

      </form>



  </div> {{-- End Form Status --}}


<div class="uk-container uk-container-small uk-box-shadow-small uk-margin-large-top uk-margin-large-bottom">

    <div class="uk-divider-icon uk-margin-medium-top">

    </div>


{{-- Start Status Postingan --}}
{{-- @foreach ($posts as $post) --}}
@if (!$statuses->count())
  <div class="uk-alert-warning" uk-alert>
    <a class="uk-alert-close" uk-close></a>
    <p>There's nothing in your timeline - Update Staus Yukk !</p>
</div>
@else
  @foreach ($statuses as $status)
    <div class="uk-card uk-card-default uk-width-2-2@m uk-margin-large-top">
        <div class="uk-card-header">
            <div class="uk-grid-small uk-flex-middle" uk-grid>

                <div class="uk-width-expand">
                    <h3 class="uk-card-title uk-margin-remove-bottom">{{ $status->user->name }}</h3>

                    <span class="uk-text-meta uk-margin-remove-top" >{{ $status->created_at->diffForHumans() }} </span>
                </div>
            </div>
        </div>
        <div class="uk-card-body">
            <p>{{ $status->body }}</p>
        </div>

        <div class="uk-card-footer">

            <a href="{{ route('status.like', ['statusId' => $status->id] )}}" class="uk-margin-small-right hatiku" uk-icon="icon: heart"></a>

            <span>{{ $status->likes->count() }} | {{ $status->replies->count() }}</span>
            <a class="reply uk-margin-small-left ngobrol" href="#comments" uk-icon="icon: comment"></a>

              <form id="hidden" style="display:none" class="uk-margin-small-top" action="{{ route('status.reply', ['statusId' => $status->id]) }}" method="post">
                    {{ csrf_field() }}
                    @if ($errors->has("reply-{{$status->id}}"))
                      <div class="uk-alert-warning" uk-alert>
                        <a class="uk-alert-close" uk-close></a>
                        <p>{{ $errors->first("reply-{$status->id}")}}</p>
                    </div>
                    @endif
              <textarea name="reply-{{ $status->id }}" class="uk-textarea {{ $errors->has("reply-{$status->id}") ? 'has-error': ''}}" rows="5" placeholder="Balas Postingan ini ..."></textarea>
              <button class="uk-button uk-button-primary uk-width-1-1 uk-margin-small-bottom">Reply</button>

              <div class="uk-divider">
              </div>

              <div uk-grid style="padding-left:60px;padding-right:60px;padding-bottom:5px;">
                @if (!$status->replies->count())
                  <div class="uk-alert-warning uk-width-1-1" uk-alert>
                    <a class="uk-alert-close" uk-close></a>
                    <p>Not found</p>
                </div>
                @endif
                @foreach ($status->replies as $reply)


                <div class="uk-width-1-1">
                  <blockquote cite="#">
                  <p>{{ $reply->body}}</p>
                  <footer>Post By  <cite style="color:rgb(139, 36, 247);">{{ $reply->user->name }}</cite> <span class="uk-float-right">{{$reply->created_at->diffForHumans() }}</span></footer>
                  <hr>
                  </blockquote>
                </div>
                @endforeach
            </div>
            </form> {{-- End Reply Form --}}


              {{-- more-vertical --}}

@if ( $status->user->id == Auth::user()->id)
                <div class="uk-inline uk-margin-small-right uk-position-right uk-margin-small">
                  <a href="#" class="" uk-icon="icon: more-vertical" ></a>
                  <div uk-dropdown="mode: click; pos: left-top" >

                  <ul class="uk-nav uk-dropdown-nav">
                      <li class="uk-active">  <a href="{{ route('status.delete', ['id' => $status->id]) }}" class="" uk-icon="icon: trash" ></a></li>
                      {{-- {{ route('delete.status', ['id' => $post->id]) }} --}}
                  </ul>
                </div>
            </div>
@endif

        </div>


    </div>
  @endforeach

@endif

{{-- @endforeach --}}


    <div class="uk-divider-icon uk-margin-medium-bottom">

    </div>
</div>
@endsection
