@extends('templates.default')
@section('scripts')
	<script>
	$( function() {
		var type_list = {!! json_encode($type_list) !!};
		$( "#type" ).autocomplete({
			source: type_list
		});
		
		var mark_list = {!! json_encode($mark_list) !!};
		$( "#mark" ).autocomplete({
			source: mark_list
		});
		
		var model_list = {!! json_encode($model_list) !!};
		$( "#model" ).autocomplete({
			source: model_list
		});
		
		var destination_list = {!! json_encode($destination_list) !!};
		$( "#destination" ).autocomplete({
			source: destination_list
		});
		
	});
	</script>
@stop

@section('content')
		<form method="POST" action="/peripherals">
		<table class='table table-bordered table-hover'>
			<tr class="success">
				<th>Id</th>
				<th>Type</th>
				<th>Mark</th>
			</tr>	
			<tr>
				<td><input type="text" name="id"></td>
				<td><input type="text" name="type" id="type"></td>
				<td><input type="text" name="mark" id="mark"></td>
			</tr>
			<tr class="success">
				<th>Model</th>
				<th>SN</th>
				<th>Destination</th>
			</tr>
			<tr>
				<td><input type="text" name="model" id="model"></td>
				<td><input type="text" name="sn"></td>
				<td><input type="text" name="destination" id="destination"></td>
			</tr>
		</table>
		<table class="table_update">
			<tr>
				<td>
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<button type="submit" class="btn btn-success pull-right">Create</button>
				</td>
			</tr>
		</table>
		</form>
	<script>
		var token = '{{ Session::token() }}';
	</script>
@stop