@extends('templates.default')

@section('content')
		<form method="POST" action="/usbtokens">
		<table class='table table-bordered table-hover'>
			<tr class="success">
				<th>USB token ID</th>
				<th>Mark/Model</th>
				<th>Classification level</th>
				<th>Employee id </th>
			</tr>	
			<tr>
				<td><input type="text" name="id"></td>
				<td><input type="text" name="mark_model"></td>
				<td>
				<label><input name="classification_level" type="radio" value="Nesecret" checked="checked"><span>Nesecret</span></label>
				<label><input name="classification_level" type="radio" value="SSv"><span>SSv</span></label>
				</td>
				<td><input type="text" name="employee_id"></td>
			</tr>
			<tr class="success">
				<th>Registration no</th>
				<th>Registration date</th>
				<th>History</th>
				<th>Notes</th>
			</tr>	
			<tr>
				<td><input type="text" name="registration_no"></td>
				<td><input type="date" name="registration_date"></td>
				<td><input type="text" name="history"></td>
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