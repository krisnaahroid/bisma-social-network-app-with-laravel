<!DOCTYPE html>
<html>
<head>
	<title>SMK BISMA | LOGIN</title>
	@include('./partikel._head')
	<style>
		body{

		}
	</style>
</head>

<body>
<div class="uk-container">
	<div class="" style="position:relative;top:170px;">
		<h2 class="uk-text-center">LOGIN - STUDENT</h2>
		<div class="uk-divider-icon">
		</div>
	</div>

	<form class="uk-position-center" role="form" method="POST" action="{{ route('login') }}">
		{{ csrf_field() }}
    <div class="uk-margin {{ $errors->has('email') ? ' has-error' : '' }}">
        <div class="uk-inline">
            <span class="uk-form-icon" uk-icon="icon: user"></span>
            <input id="email" type="email" class="uk-input" name="email" value="{{ old('email') }}" required autofocus>
        </div>
    </div>

    <div class="uk-margin">
        <div class="uk-inline">
            <span class="uk-form-icon uk-form-icon-flip" uk-icon="icon: lock"></span>
            <input id="password" type="password" class="uk-input" name="password" required>
        </div>
    </div>

		<div class="uk-margin">
			<div class="uk-inline">
				<label><input class="uk-checkbox" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me</label>
			</div>
		</div>

		<button class="uk-button uk-button-default uk-width-1-1 uk-margin-small-bottom" type="submit"><span uk-icon="icon: sign-in"> LOGIN</span></button>

</form>
</div>


</body>

</html>
