@extends('templates.default')

@section('content')
	@if(!$usbtoken)
		<p>Usb token not found</p>
	@else
		@include('modals/remove_confirmation')
		@include('modals/delete_confirmation_with_reason')
		<form method="POST" action="/usbtokens/{{ $usbtoken->id }}">
		<table class='table table-bordered table-hover'>
			<tr class="success">
				<th>USB token ID</th>
				<th>Mark/Model</th>
				<th>Classification level</th>
				<th>Employee id 
					<div class='pull-right'>
					<a type='button' class='btn btn-xs btn-danger' id="remove_usbtoken" title='Remove USB token from employee'><i class="fa fa-trash-o" aria-hidden="true"></i></a>
					</div>
				</th>
			</tr>	
			<tr>
				<td><input type="text" name="id" readonly="readonly" value="{{ $usbtoken->id }}"></td>
				<td><input type="text" name="mark_model" readonly="readonly" value="{{ $usbtoken->mark_model }}"></td>
				<td>
				<label><input name="classification_level" type="radio" value="Nesecret" @if ($usbtoken->classification_level === "Nesecret") checked="checked" @endif><span>Nesecret</span></label>
				<label><input name="classification_level" type="radio" value="SSv" @if ($usbtoken->classification_level === "SSv") checked="checked" @endif><span>SSv</span></label>
				</td>
				
				<td><div>
				<a href="{{ route('employees.edit', ['id' => $usbtoken->employee_id]) }}" id="a_remove_usbtoken" class="td_a">{{ $usbtoken->employee_id }}</a>
				</div></td>
			</tr>
			<tr class="success">
				<th>Registration no</th>
				<th>Registration date</th>
				<th>History</th>
				<th>Notes</th>
			</tr>	
			<tr>
				<td><input type="text" name="registration_no" value="{{ $usbtoken->registration_no }}"></td>
				<td><input type="date" name="registration_date" value="{{ $usbtoken->registration_date }}"></td>
				<td><input type="text" name="history" value="{{ $usbtoken->history }}"></td>
				<td><input type="text" name="notes" value="{{ $usbtoken->notes }}"></td>
			</tr>
		</table>
		<table class="table_update">
		<tr>
			<td>
				<button id="delete_usbtoken" class="btn btn-danger">Delete</button>
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
		var id = '{{ $usbtoken->id }}';
		
		$(document).ready(function(){
			$("#remove_usbtoken").click(function(e) {
				e.preventDefault();
				$('#confirm_remove').modal({ backdrop: 'static', keyboard: false })
					.on('click', '#remove-btn', function(){
						$.ajax({
							url: '/partials/structure',
							method: "GET", 
							data: {id:id, remove_usbtoken:'remove_usbtoken'},
							success: function(data){
								$.ajax({
									url: '/partials/structure',
									method: "GET", 
									data: {id:id, refresh_usbtoken:'remove_usbtoken'},
									success: function(data){
										$('#a_remove_usbtoken').html(data.employee_id);
									}
								});
							}
						});
						
						$('#confirm_remove').modal('hide');
						
					});
			});	
			
			$("#delete_usbtoken").click(function(e) {
				e.preventDefault();
				$('#confirm').modal({ backdrop: 'static', keyboard: false })
					.on('click', '#delete-btn', function(){
						var reason = $('#reason').val();
						$.ajax({
							url: '/partials/structure',
							method: "GET", 
							data: {id:id, reason: reason, delete_usbtoken:'delete_usbtoken'},
						});
						
						$('#confirm').modal('hide');
						
						window.location.href = "http://assetmanager.dev";
						
				});
				$('#alert').addClass("alert alert-success").html('Succesfully deleted');
				
			});
			
		});
	</script>
@stop