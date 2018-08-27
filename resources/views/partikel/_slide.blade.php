<div class="uk-container">
  <nav class="uk-navbar uk-navbar-container uk-margin">
    <div class="uk-navbar-left">

        <a class="uk-navbar-item uk-logo" href="#">SMK BISMA</a>
        @if(Auth::guest())

        <ul class="uk-navbar-nav">
            <li class="uk-active"><a href="#loginku" uk-scroll>  <span uk-icon="icon:  sign-in; ratio: 2"></span></a></li>
        </ul>
          @else
          <ul class="uk-navbar-nav">
              <li class="uk-active"><a href="/profile"><span uk-icon="icon:  user; ratio: 2"></span></a></li>
          </ul>
          @endif

    </div>
    <div class="uk-navbar-right">

        <a class="uk-navbar-toggle" href="#modal-full" uk-search-icon uk-toggle></a>

    </div>
</nav>

<div id="modal-full" class="uk-modal-full uk-modal" uk-modal>
    <div class="uk-modal-dialog uk-flex uk-flex-center uk-flex-middle" uk-height-viewport>
        <button class="uk-modal-close-full" type="button" uk-close></button>
        <form class="uk-search uk-search-large">
            <input class="uk-search-input uk-text-center" type="search" placeholder="Search..." autofocus>
        </form>
    </div>
</div>
</div>
