@extends('main')

@section('title', 'Wellcome')

@section('kontent')

  <div class="uk-container uk-container-center uk-margin-top uk-margin-large-bottom">
    <hr class="uk-divider-icon">
    <div class="" uk-grid>

      <div class="uk-width-expand@m">
          @include('partikel._feature')
        <hr>

        <br><br>





  <div class="uk-divider-icon">

  </div>
  <br><br><br>
  <div class="uk-container">
    @foreach ($skills as $skill)


    <div class="uk-card uk-card-default uk-grid-collapse uk-child-width-1-2@s uk-margin uk-text-center" uk-grid>
      <div class="uk-card-media-left uk-cover-container">
          <img src="{!! url('images/'.$skill->image) !!}" alt="" uk-cover>
          <canvas width="600" height="400"></canvas>
      </div>
      <div>
          <div class="uk-card-body">
              <h3 class="uk-card-title">{{ $skill->title}}</h3>
              <p>{!! str_limit($skill->content, 300) !!}</p>
          </div>
          <div class="uk-animation-toggle">
            <a style="-webkit-box-shadow: 0px 2px 5px 0px rgba(196,196,196,1);-moz-box-shadow: 0px 2px 5px 0px rgba(196,196,196,1);box-shadow: 0px 2px 5px 0px rgba(196,196,196,1);" class="uk-button uk-button-default uk-animation-scale-down uk-box-shadow" href="{{ route('show.jurusan', $skill->slug) }}">Read More</a>
          </div>
      </div>
  </div>
  @endforeach






  </div>

{{-- Gallery Kami --}}
<div class="uk-divider-icon uk-margin-large-top">
</div>
<h2 class="uk-text-center" style="border-bottom:2px solid #db00ff;width:40%;margin:auto;padding-bottom:8px;">GALLERY</h2>
<div class="uk-child-width-1-3@m uk-margin-large-top " uk-grid uk-scrollspy="cls: uk-animation-fade; target: > div > .uk-card; delay: 500; repeat: true">



@foreach ($galleris->slice(0, 6) as $galleri)
  <div>
    <div class="uk-card uk-card-default ">
        <div class="uk-card-media-top">
            <img src="{{ asset('/gallery/'.$galleri->image)}}" alt="">
        </div>

        <div class="uk-card-footer" style="text-align:center;">
            <p>{!! $galleri->description !!}</p>
        </div>
    </div>
</div>
@endforeach
<div class="uk-animation-toggle uk-align-center gallerimore" style="text-align:center;">
  <a class="uk-animation-shake uk-animation-reverse" uk-icon="icon: more; ratio:5" href="{{ route('show.gallery') }}"></a>
</div>
</div>

  <br id="loginku" uk-scroll><br >

  <div class="parallax uk-text-center" >

  <div id="formsiswa" >
  <h2 class="uk-text-center uk-text-bold uk-text-uppercase uk-text-success">Login - Students</h2>
    <hr class="uk-divider-icon">
    <form class="siswalogin" method="POST" action="{{ route('login') }}">
        {{ csrf_field() }}

          <div class="uk-margin">
              <div class="uk-inline">
                  <span class="uk-form-icon uk-icon" uk-icon="icon: user"></span>
                  <input class="uk-input" id="email" type="email" name="email" value="{{ old('email') }}" required>
                  @if ($errors->has('email'))
                      <span class="help-block">
                          <strong>{{ $errors->first('email') }}</strong>
                      </span>
                  @endif
              </div>
        </div>

        <div class="uk-margin">
            <div class="uk-inline">
                <span class="uk-form-icon uk-form-icon-flip uk-icon" uk-icon="icon: lock"></span>
                <input class="uk-input" id="password" type="password" name="password" required>
                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
        </div>




            <div class="cuk-margin">
                <div class="uk-inline">
                    <label style="color:white;">
                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                    </label>
                </div>
            </div>


            <div class="uk-margin">
              <div class="uk-inline">
                <button class="uk-button uk-button-default uk-button-large"><span uk-icon="icon:  sign-in; ratio: 2" style="color:white;" class="uk-icon"></span></button>
              </div>

            </div>


        </div>
    </form>
  </div>

  </div>

  <br>
<div class="uk-child-width-5-6@s uk-child-width-5-7@m" uk-grid>
  @foreach ($info as $i)
    <div>
      <div class="uk-divider-icon"></div>
      <div class="uk-card uk-card-default uk-card-body">
        <div class="uk-card uk-card-default ">
          <div class="uk-card-header">
              <div class="uk-grid-small uk-flex-middle" uk-grid>
                  <div class="uk-width-expand uk-text-center">
                      <h3 class="uk-card-title uk-margin-remove-bottom">{{ $i->title }}</h3>
                      <p class="uk-text-meta uk-margin-remove-top"><time datetime="2016-04-01T19:00">{{ $i->created_at}}</time></p>
                  </div>
              </div>
          </div>
          <div class="uk-card-body">
              <p>{!! $i->body !!}</p>
          </div>

          <br>
        </div>
      </div>

      <div class="uk-divider-icon"></div>
    </div>
  @endforeach

</div>
  <br><br>

  <div class="uk-child-width-1-2@s uk-child-width-1-7@m uk-text-center" uk-grid>
    @foreach ($beritas->slice(0, 4) as $berita)
      <div>
        <div class="uk-card uk-card-default uk-card-body">
          <div class="uk-card uk-card-default ">
            <div class="uk-card-header">
                <div class="uk-grid-small uk-flex-middle" uk-grid>
                    <div class="uk-width-expand">
                        <h3 class="uk-card-title uk-margin-remove-bottom">{{ $berita->title }}</h3>
                        <p class="uk-text-meta uk-margin-remove-top"><time datetime="2016-04-01T19:00">{{ $berita->created_at }}</time></p>
                    </div>
                </div>
            </div>
            <div class="uk-card-body">
                <p>{!! str_limit($berita->body, 200) !!}</p>
            </div>
              <a href="{{ route('show.berita', $berita->slug) }}" style="text-decoration:none;color:rgb(98, 98, 98);">
                <div class="uk-card-footer" id="news">
                <p>READ MORE</p>
              </div>
            </a>
          </div>
        </div>
      </div>
    @endforeach
  </div>

      </div>

  <div class="uk-divider-icon">

  </div>

@foreach ($advance as $texts)
  <div class="uk-child-width-5-6@s uk-child-width-5-7@m" uk-grid>
      <div>
        <div class="uk-card uk-card-default uk-card-body">
          <p>{!! $texts->body !!}</p>
        </div>

        <div class="uk-divider-icon"></div>
      </div>
  </div>
@endforeach


  <div class="uk-container">
    <h2 class="uk-text-center">Kenapa Memilih Kami ?</h2>
  </div>

      <div class="uk-grid-divider uk-child-width-expand@s" uk-grid style="margin-top:100px;">
        @foreach ($whys as $why)
          <div>{{ $why->body }}</div>
        @endforeach

      </div>


  </div>

@endsection
