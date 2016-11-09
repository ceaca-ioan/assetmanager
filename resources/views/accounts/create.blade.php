@extends('templates.default')

@section('content')
	<form method="POST" action="/accounts">
	<table class='table table-bordered table-hover'>
			<tr class="success">
				<th>Account ID</th>
				<th>Employee ID</th>
				<th>Account type</th>
				<th>CIS</th>
			</tr>	
			<tr>
				<td><input type="text" name="id"></td>
				<td><input type="text" name="employee_id" readonly="readonly" value="{{ $employee_id }}"></td>
				<td>
				<label><input class="type" name="type" type="radio" value="User" checked="checked"><span>User</span></label>
				<label><input class="type" name="type" type="radio" value="Admin"><span>Admin</span></label>
				</td>
				<td>
				<select id="cis" name="cis_name">
				</select>
				</td>
				
			</tr>	
			
			<tr class="success">
				<th>Approval no</th>
				<th>Approval date</th>
				<th>Status</th>
				<th>Notes</th>
			</tr>
			<tr>
				<td><input type="text" name="approval_number"></td>
				<td><input type='date' name="approval_date"></td>
				<td>
				<label><input class="status" name="status" type="radio" value=1 checked="checked"><span>Enabled</span></label>
				<label><input class="status" name="status" type="radio" value=0><span>Disabled</span></label>
				</td>
				<td><input type='text' name="notes"></td>
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
		
		function load_cis()
		{
			$.ajax({
				url: '/partials/structure',
				method: "GET", 
				data: {cis:'cis'},
				success: function(data){
					$(data.cis_names).each(function(index, cis) {
						$("#cis").append(new Option(cis));
					});
				}
			});
		}
		
		$(document).ready(function(){

			load_cis();
		
		});
		
	</script>
@stop