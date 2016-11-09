@extends('templates.default')

@section('content')

	<div class="row">
	<form class="form-vertical" role="form" method="post" action="{{ route('profile') }}">
		<div class="row">
			<div class="col-lg-6">
				<div class="form-group {{ $errors->has('first_name') ? 'has-error' : '' }}">
					<label for="first_name" class="control-label">First name</label>
					<input type="text" name="first_name" class="form-control" id="first_name" value="{{ Request::old('first_name') ?: Auth::user()->first_name }}">
					
				</div>
			</div>
			
		</div>
	</form>
	</div>
	<script>
		var token = '{{ Session::token() }}';
		var url = '{{ route('profile') }}';
	</script>
@stop