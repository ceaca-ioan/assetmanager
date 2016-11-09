@extends('templates.default')

@section('content')
		<form method="POST" action="/personalphones">
		<table class='table table-bordered table-hover'>
			<tr class="success">
				<th>Employee ID</th>
				<th>Mark</th>
				<th>Model</th>
				<th>Notes</th>
			</tr>	
			<tr>
				<td><input type="text" name="employee_id" readonly="readonly" value="{{ $employee_id }}"></td>
				<td><input type="text" name="mark"></td>
				<td><input type="text" name="model"></td>
				<td><input type="text" name="notes"></td>
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