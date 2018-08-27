<div class="uk-card uk-card-default uk-card-body">
  <div class="uk-child-width-1-2@s uk-child-width-1-3@m uk-text-center" uk-grid>
      <div>
          <div class="uk-card uk-card-default uk-card-body" title="Organization" uk-tooltip="pos: top">
            <span uk-icon="icon:  users; ratio: 2"></span>

          </div>
      </div>
      <div>
          <div class="uk-card uk-card-default uk-card-body"  title="Send an email" uk-tooltip="pos: top">
            <span uk-icon="icon: mail; ratio: 2"></span>
          </div>
      </div>
      <div>
          <div class="uk-card uk-card-default uk-card-body"  title="Chatting" uk-tooltip="pos: top">
            @if(Auth::guest())
              <a href="{{ route('login') }}">
              <span uk-icon="icon: comments; ratio: 2"></span>
              </a>
              @else
                <a href="{{ url('/home') }}">
                <span uk-icon="icon: comments; ratio: 2"></span>
                </a>
              @endif

          </div>
      </div>
      <div>
          <div class="uk-card uk-card-default uk-card-body" title="Upload Your Image" uk-tooltip="pos: bottom">
            @if(Auth::guest())
              <a href="{{ route('login') }}">
            <span uk-icon="icon:  cloud-upload; ratio: 2"></span>
              </a>
            @else
              <a href="{{ url('/upload')}}">
              <span uk-icon="icon:  cloud-upload; ratio: 2"></span>
              </a>
            @endif
          </div>
      </div>
      <div>
          <div class="uk-card uk-card-default uk-card-body" title="News - BKK" uk-tooltip="pos: bottom">
            <span uk-icon="icon:  info; ratio: 2"></span>

          </div>
      </div>
      <div>
          <div class="uk-card uk-card-default uk-card-body" title="Downloads" uk-tooltip="pos: bottom">
            <span uk-icon="icon:  cloud-download; ratio: 2"></span>

          </div>
      </div>
  </div>
</div>
