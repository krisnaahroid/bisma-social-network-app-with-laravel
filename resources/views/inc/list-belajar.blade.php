<div class="" style="margin-top:100px;">
  <button class="uk-button uk-button-default uk-width-5-6@m uk-align-center" type="button">E-Learn</button>
        <div uk-dropdown="animation: uk-animation-slide-top-small; duration: 1000" uk-dropdown="pos: bottom-center">
            <ul class="uk-nav uk-dropdown-nav">
              @foreach($categories as $category)
                <li ><a href="{{ route('catpage', ['category_id' => $category->id])}}">{{ $category->name }}</a></li>
                <hr>
                @endforeach
            </ul>
        </div>
</div>
