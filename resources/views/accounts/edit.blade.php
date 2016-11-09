@extends('templates.default')

@section('content')
@if(!$account)
	<p>Account not found</p>
@else
	 @include('modals/delete_confirmation_with_reason')
	<form method="POST" action="/accounts/{{ $account->id }}">
	<table class='table table-bordered table-hover'>
			<tr class="success">
				<th>Account ID</th>
				<th>Employee ID</th>
				<th>Account type</th>
				<th>CIS</th>
			</tr>	
			<tr>
				<td><input type="text" name="id" readonly="readonly" value="{{ $account->id }}"></td>
				<td><div><a href="{{ route('employees.edit', ['id' => $account->employee_id]) }}" class="td_a">{{ $account->employee_id }}</a></div></td>
				<td>
				<label><input class="type" name="type" type="radio" value="User" @if ($account->type === 'User') checked="checked" @endif><span>User</span></label>
				<label><input class="type" name="type" type="radio" value="Admin" @if ($account->type === 'Admin') checked="checked" @endif><span>Admin</span></label>
				</td>
				<td>
				<select id="cis" name="cis">
					<option selected >{{ $account->cis_name }}</option>
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
				<td><input type="text" name="approval_number" value="{{ $account->approval_number }}"></td>
				<td><input type='date' name="approval_date" value='{{ $account->approval_date }}'></td>
				<td>
				<label><input class="status" name="status" type="radio" value=1 @if ($account->status === 1) checked="checked" @endif><span>Enabled</span></label>
				<label><input class="status" name="status" type="radio" value=0 @if ($account->status === 0) checked="checked" @endif><span>Disabled</span></label>
				</td>
				<td><input type='text' name="notes" id='notes' value='{{ $account->notes }}'></td>
			</tr>
		</table>
		<table class="table_update">
		<tr>
			<td>
				<button id="delete_account" class="btn btn-danger">Delete</button>
			</td>
			<td>
				<input type="hidden" name="_token" value="{{ csrf_token() }}">    
				<button type="submit" class="btn btn-success pull-right">Update</button>
			</td>
		</tr>
		</table>
		</form>
@endif
		
	<script>
		var token = '{{ Session::token() }}';
		var id = '{{ $account->id }}';
		// var url = '{{ route('accounts.update', ['id' => $account->id]) }}';
		var present_cis = '{{ $account->cis_name }}';
		
		function load_cis()
		{
			$.ajax({
				url: '/partials/structure',
				method: "GET", 
				data: {id:id, cis:'cis'},
				success: function(data){
					$(data.cis_names).each(function(index, cis) {
						if(cis !== present_cis){
							$("#cis").append(new Option(cis));
						}
					});
				}
			});
		}
		
		$(document).ready(function(){

			load_cis();
			
			$("#delete_account").click(function(e) {
				e.preventDefault();
				$('#confirm').modal({ backdrop: 'static', keyboard: false })
					.on('click', '#delete-btn', function(){
						var reason = $('#reason').val();
						$.ajax({
							url: '/partials/structure',
							method: "GET", 
							data: {id:id, reason: reason, delete_account:'delete_account'},
						});
						
						$('#confirm').modal('hide');
						
						window.location.href = "http://assetmanager.dev";
						
				});
				$('#alert').addClass("alert alert-success").html('Succesfully deleted');
				
			});
		
		});
		
	</script>
@stop