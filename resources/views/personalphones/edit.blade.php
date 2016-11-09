@extends('templates.default')

@section('content')
	@if(!$personalphone)
		<p>Personal phone not found</p>
	@else
		@include('modals/delete_confirmation')
		<form method="POST" action="/personalphones/{{ $personalphone->id }}">
		<table class='table table-bordered table-hover'>
			<tr class="success">
				<th>Personal phone ID</th>
				<th>Employee ID</th>
				<th>Mark</th>
				<th>Model</th>
				<th>Notes</th>
			</tr>	
			<tr>
				<td><input type="text" name="id" readonly="readonly" value="{{ $personalphone->id }}"></td>
				<td><div>
				<a href="{{ route('employees.edit', ['id' => $personalphone->employee_id]) }}" class="td_a">{{ $personalphone->employee_id }}</a>
				</div></td>
				<td><input type="text" name="mark" value="{{ $personalphone->mark }}"></td>
				<td><input type="text" name="model" value="{{ $personalphone->model }}"></td>
				<td><input type="text" name="notes" value="{{ $personalphone->notes }}"></td>
			</tr>
			
		<table class="table_update">
		<tr>
			<td>
				<button id="delete_personalphone" class="btn btn-danger">Delete</button>
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
		var id = '{{ $personalphone->id }}';
		
		$(document).ready(function(){

			$("#delete_personalphone").click(function(e) {
				e.preventDefault();
				$('#confirm').modal({ backdrop: 'static', keyboard: false })
					.on('click', '#delete-btn', function(){
						$.ajax({
							url: '/partials/structure',
							method: "GET", 
							data: {id:id, delete_personalphone:'delete_personalphone'},
						});
						
						$('#confirm').modal('hide');
						
						window.location.href = "http://assetmanager.dev";
						
				});
				$('#alert').addClass("alert alert-success").html('Succesfully deleted');
				
			});
			
		});
	</script>
	
@stop