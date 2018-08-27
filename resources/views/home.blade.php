<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>SMK BISMA | @yield('judul')</title>
    <link rel="stylesheet" href="/css/uikit.min.css">
    <link rel="stylesheet" href="/css/mainku.css" />
    {{-- <link rel="stylesheet" href="/css/main.css" /> --}}
    <script src="/js/jquery.js"></script>
    <script src="/js/main.js"></script>
    <script src="/js/uikit.min.js"></script>
    <script src="/js/uikit-icons.min.js"></script>

  </head>
  <body>

    <div class="uk-container-expand uk-box-shadow-medium" id="navmenu" >
        <nav class="uk-navbar-container uk-navbar-transparent uk-padding-large uk-padding-remove-vertical" uk-navbar>
            <div class="uk-navbar-left">
                <ul class="uk-navbar-nav">
                    <li class="ad_navicon_toggle"><a href="/home" uk-icon="icon: home"></a></li>
                    <li class="ad_navicon_toggle"><a href="/info" uk-icon="icon: info"></a></li>
                </ul>
            </div>
            <div class="uk-navbar-center">
                <ul class="uk-navbar-nav">
                    <li class="uk-active"><a href=""><img src="/img/Logo.png" width="65" height="65"  alt="smk bisma logo"  ></a></li>
                </ul>
            </div>
            <div class="uk-navbar-right">
                <ul class="uk-navbar-nav">

                    <li class="ad_navicon_toggle"><a href="" uk-icon="icon: tag"></a></li>
                    <li class="ad_navicon_toggle"><a href="" uk-icon="icon: user"></a></li>
                    <div uk-dropdown>
                        <ul class="uk-nav uk-dropdown-nav">
                          @if (Auth::guest())

                          @else
                              <li class="dropdown">
                                  <a href="3" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                      {{ Auth::user()->name }} <span class="caret"></span>
                                  </a>

                              </li>
                              <li>
                                  <a href="{{ route('logout') }}"
                                      onclick="event.preventDefault();
                                               document.getElementById('logout-form').submit();"uk-icon="icon:  sign-out">
                                      Logout
                                  </a>

                                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                      {{ csrf_field() }}
                                  </form>
                              </li>
                          @endif
                        </ul>
                    </div>
                </ul>
            </div>
        </nav>
    </div>

    <!--end navigation panel -->


      @yield('isikontentuser')




  </body>
</html>
