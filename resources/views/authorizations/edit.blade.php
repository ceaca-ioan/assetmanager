@extends('templates.default')

@section('content')
@if(!$authorization)
	<p>Authorization not found</p>
@else
	 @include('modals/delete_confirmation')
	<form method="POST" action="/authorizations/{{ $authorization->id }}">
	<table class='table table-bordered table-hover'>
			<tr class="success">
				<th>Serial Number</th>
				<th>Employee id</th>
				<th>Authorization level</th>
				<th>Issue date</th>
				<th>Expiry date</th>
			</tr>	
			<tr>
				<td><input type="text" name="sn" value="{{ $authorization->sn }}"></td>
				<td><div><a href="{{ route('employees.edit', ['id' => $authorization->employee_id]) }}" class="td_a">{{ $authorization->employee_id }}</a></div></td>
				<td>
				<select id="authorization_level" name="authorization_level">
					<option selected>{{ $authorization->authorization_level }}</option>
					@foreach ($authorization_levels as $authorization_level)
						<option>{{$authorization_level}}</option>
					@endforeach
				</select>
				</td>
				<td><input type="date" name="issue_date" value="{{ $authorization->issue_date }}"></td>
				<td><input type="date" name="expiry_date" value="{{ $authorization->expiry_date }}"></td>
				
			</tr>	
			
			
		</table>
		<table class="table_update">
		<tr>
			<td>
				<button id="delete_authorization" class="btn btn-danger">Delete</button>
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
		var id = '{{ $authorization->id }}';
		var url_afer_delete = "{{ route('employees.edit', ['id' => $authorization->employee_id]) }}"; 
		
		$(document).ready(function(){
			
			$("#delete_authorization").click(function(e) {
				e.preventDefault();
				$('#confirm').modal({ backdrop: 'static', keyboard: false })
					.on('click', '#delete-btn', function(){
						$.ajax({
							url: '/partials/structure',
							method: "GET", 
							data: {id:id, delete_authorization:'delete_authorization'},
						});
						
						$('#confirm').modal('hide');	
						window.location.href = url_afer_delete;
				});
				$('#alert').addClass("alert alert-success").html('Deleted succesfully');
				
			});
		
		});
		
	</script>
@stop