@extends('templates.default')

@section('content')
		<form method="POST" action="/authorizations"> 
		<table class='table table-bordered table-hover'>
			<tr class="success">
				<th>Serial Number</th>
				<th>Employee id</th>
				<th>Authorization level</th>
				<th>Issue date</th>
				<th>Expiry date</th>
			</tr>	
			<tr>
				<td><input type="text" name="sn"></td>
				<td><input type="text" name="employee_id" readonly="readonly" value="{{ $employee_id }}"></td>
				<td>
				<select name="authorization_level">
				@foreach ($authorization_levels as $authorization_level)
					<option>{{$authorization_level}}</option>
				@endforeach
				</select>
				</td>
				<td><input type="date" name="issue_date"></td>
				<td><input type="date" name="expiry_date"></td>
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