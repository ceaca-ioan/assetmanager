@extends('templates.default')

@section('content')
	<h3>Sign in</h3>
	<div class="row">
		<div class="col-lg-4">
			<form class="form-vertical" role="form" method="post" action="{{ route('auth.signin') }}">
				<div class="form-group {{ $errors->has('username') ? 'has-error' : '' }}">
					<label for="username" class="control-label">Username</label>
					<input type="text" name="username" class="form-control" id="username" value="{{ Request::old('username') ?: '' }}">
					@if ($errors->has('username'))
						<span class="help-block">{{ $errors->first('username') }}</span>
					@endif
				</div>
				<div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
					<label for="password" class="control-label">Password</label>
					<input type="password" name="password" class="form-control" id="password">
					@if ($errors->has('password'))
						<span class="help-block">{{ $errors->first('password') }}</span>
					@endif
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-default">Sign in</button>
				</div>
				<input type="hidden" name="_token" value="{{ Session::token() }}">
			</form>
		</div>
	</div>
@stop