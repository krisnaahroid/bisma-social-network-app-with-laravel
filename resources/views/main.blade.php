
<!DOCTYPE html>
<html>
    <head>
      <title>SMK BISMA | @yield('title')</title>
      @include('partikel._head')
    </head>
    <body>

<div class="uk-container-expand">

@include('partikel._nav')

@include('partikel._brand')
</div>

@include('partikel._slide')


@yield('kontent')

</div> {{-- END CONTAINER --}}

@include('partikel._scrollup')

  @include('partikel._footer')

    </body>
</html>
