@extends('templates.default')

@section('content')
	<h3>Sign up</h3>
	<div class="row">
		<div class="col-lg-6">
			<form class="form-vertical" role="form" method="post" action="{{ route('auth.signup') }}">
				<div class="form-group {{ $errors->has('first_name') ? 'has-error' : '' }}">
					<label for="first_name" class="control-label">Your first name</label>
					<input type="text" name="first_name" class="form-control" id="first_name" value="{{ Request::old('first_name') ?: '' }}">
					@if ($errors->has('first_name'))
						<span class="help-block">{{ $errors->first('first_name') }}</span>
					@endif
				</div>
				<div class="form-group {{ $errors->has('last_name') ? 'has-error' : '' }}">
					<label for="last_name" class="control-label">Your last name</label>
					<input type="text" name="last_name" class="form-control" id="last_name" value="{{ Request::old('last_name') ?: '' }}">
					@if ($errors->has('last_name'))
						<span class="help-block">{{ $errors->first('last_name') }}</span>
					@endif
				</div>
				<div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
					<label for="email" class="control-label">Your email address</label>
					<input type="text" name="email" class="form-control" id="email" value="{{ Request::old('email') ?: '' }}">
					@if ($errors->has('email'))
						<span class="help-block">{{ $errors->first('email') }}</span>
					@endif
				</div>
				<div class="form-group {{ $errors->has('pnc') ? 'has-error' : '' }}">
					<label for="pnc" class="control-label">Your personal identity number</label>
					<input type="text" name="pnc" class="form-control" id="pnc" value="{{ Request::old('pnc') ?: '' }}">
					@if ($errors->has('pnc'))
						<span class="help-block">{{ $errors->first('pnc') }}</span>
					@endif
				</div>
				<div class="form-group {{ $errors->has('username') ? 'has-error' : '' }}">
					<label for="username" class="control-label">Chose a username</label>
					<input type="text" name="username" class="form-control" id="username" value="{{ Request::old('username') ?: '' }}">
					@if ($errors->has('username'))
						<span class="help-block">{{ $errors->first('username') }}</span>
					@endif
				</div>
				<div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
					<label for="password" class="control-label">Choose a password</label>
					<input type="password" name="password" class="form-control" id="password">
					@if ($errors->has('password'))
						<span class="help-block">{{ $errors->first('password') }}</span>
					@endif
				</div>
				
				<div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
					<label for="password-confirm" class="control-label">Confirm Password</label>
					<input type="password" name="password_confirmation" class="form-control" id="password-confirm">
					@if ($errors->has('password_confirmation'))
						<span class="help-block">{{ $errors->first('password_confirmation') }}</span>
					@endif
				</div>
				
				<div class="form-group">
					<button type="submit" class="btn btn-default">Sign up</button>
				</div>
				<input type="hidden" name="_token" value="{{ Session::token() }}">
			</form>
		</div>
	</div>
@stop