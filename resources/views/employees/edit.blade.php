@extends('templates.default')

@section('content')
	@if(!$employee)
		<p>Employee not found</p>
	@else
	@include('modals/add_unallocated_usb_token')
	@include('modals/delete_confirmation_with_reason')
	<form method="POST" action="/employees/{{ $employee->id }}">
	<table class='table table-bordered table-hover'>
		<tr class="success">
			<th>Employee ID</th>
			<th>First name</th>
			<th>Last name</th>
			<th>Father last name</th>
			<th>Rank</th>
			<th>Position</th>
		</tr>	
		<tr>
			<td><input type="text" name="id" readonly="readonly" value="{{ $employee->id }}"></td>
			<td><input type="text" name="first_name" value="{{ $employee->first_name }}"></td>
			<td><input type="text" name="last_name" value="{{ $employee->last_name }}"></td>
			<td><input type="text" name="father_last_name" value="{{ $employee->father_last_name }}"></td>
			<td>
				<select id="rank" name="rank">
				<option selected>{{ $employee->rank }}</option>
				@foreach ($ranks as $rank)
					<option>{{$rank}}</option>
				@endforeach
			</select>
			</td>
			<td>
			<select id="position" name="position">
				<option selected>{{ $employee->position }}</option>
					@foreach ($positions as $position)
					<option>{{$position}}</option>
					@endforeach
			</select>
			</td>
		</tr>
		<tr class="success">
			<th>Organization</th>
			<th>Department</th>
			<th>Section</th>
			<th>Work phone no</th>
			<th>Personal phone no</th>
			<th>Notes</th>
		</tr>	
		<tr>
			<td>
				<select id="organization" name="organization">
					<option selected>{{ $employee->organization }}</option>
				</select>
				<td>
				<select id="department" name="department">
					<option selected>{{ $employee->department }}</option>
				</select>
				</td>
				<td>
				<select id="section" name="section">
					<option selected>{{ $employee->section }}</option>
				</select>
				</td>
				<td><input type="text" name="work_phone_no" value="{{ $employee->work_phone_no }}"></td>
				<td><input type="text" name="personal_phone_no" value="{{ $employee->personal_phone_no }}"></td>
				<td><input type="text" name="notes" value="{{ $employee->notes }}"></td>
		</tr>
	</table>
	<table class="table_update">
		<tr>
			<td>
				<button id="delete_employee" class="btn btn-danger">Delete</button>
			</td>
			<td>
				<input type="hidden" name="_token" value="{{ csrf_token() }}">    
				<button type="submit" class="btn btn-success pull-right">Update</button>
			</td>
		</tr>
	</table>
	</form>
	@endif

	
		
		<table class='table table-bordered table-hover'>
			<tr class="success">
				<th style="width: 20%">Accounts
				<div class='pull-right'>
					<a href="{{ route('accounts.create', ['employee_id' => $employee->id]) }}" type='button' class='btn btn-xs btn-primary' id="add_account" title='Create new account for this employee'><i class="fa fa-plus" aria-hidden="true"></i></a>
				</div>
				</th>
				<th style="width: 20%">Computers</th>
				<th style="width: 20%">USB tokens
				<div class='pull-right'>
					<a type='button' class='btn btn-xs btn-primary' id="add_usbtoken" title='Add unallocated USB token for this employee'><i class="fa fa-plus" aria-hidden="true"></i></a>
				</div>
				</th>
				<th style="width: 20%">Personal phones
				<div class='pull-right'>
					<a href="{{ route('personalphones.create', ['employee_id' => $employee->id]) }}" type='button' class='btn btn-xs btn-primary' id="add_account" title='Create new personal phone for this employee'><i class="fa fa-plus" aria-hidden="true"></i></a>
				</div>
				</th>
				<th style="width: 20%">
				<div class='pull-right'>
					<a href="{{ route('authorizations.create', ['employee_id' => $employee->id]) }}" type='button' class='btn btn-xs btn-primary' id="add_authorization" title='Create new authorization for this employee'><i class="fa fa-plus" aria-hidden="true"></i></a>
				</div>
				Authorizations
				</th>
			</tr>
			<tr>
				<td>
					@if($employee->accounts->count() >=1)
						@foreach($employee->accounts as $account)
							<div class="margins_5">
								<a href="{{ route('accounts.edit', ['id' => $account->id]) }}" role='button' @if ($account->status === 0) class='btn btn-default min_w_150 red' @else class='btn btn-default min_w_150' @endif>{{ $account->id }} </a>
							</div>
						@endforeach
					@else																																														
						<p> No results</p>
					@endif
				</td>
				<td>
					@if($employee->accounts->count() >=1)
						@foreach($employee->accounts as $account)
							@foreach($account->computers as $computer)
							<div class="margins_5">
								<a href="{{ route('computers.edit', ['id' => $computer->id]) }}" class='btn btn-default min_w_150' role='button'> {{ $computer->id }} ({{ $account->id }})</a>
							</div>
							@endforeach
						@endforeach
					@else																																														
						<p> No results</p>
					@endif
				</td>
				<td>
					@if($employee->usbtokens->count() >=1)
						@foreach($employee->usbtokens as $usbtoken)
							<div class="margins_5">
								<a href="{{ route('usbtokens.edit', ['id' => $usbtoken->id]) }}" class='btn btn-default min_w_150' role='button'> {{ $usbtoken->id }} </a>
							</div>
						@endforeach
					@else																																														
						<p> No results</p>
					@endif
				</td>
				<td>
					@if($employee->personalphones->count() >=1)
						@foreach($employee->personalphones as $personalphone)
							<div class="margins_5">
								<a href="{{ route('personalphones.edit', ['id' => $personalphone->id]) }}" class='btn btn-default min_w_150' role='button'> {{ $personalphone->mark }} - {{ $personalphone->model }} </a>
							</div>
						@endforeach
					@else																																														
						<p> No results</p>
					@endif
				</td>
				<td>
					@if($employee->authorizations->count() >=1)
						@foreach($employee->authorizations as $authorization)
							<div class="margins_5">
								<a href="{{ route('authorizations.edit', ['id' => $authorization->id]) }}" class='btn btn-default min_w_150' role='button'> {{ $authorization->sn }} </a>
							</div>
						@endforeach
					@else																																														
						<p> No results</p>
					@endif
				</td>
			</tr>
		</table>
		
		<script>
		var token = '{{ Session::token() }}';
		var id = '{{ $employee->id }}';
		var present_organization = '{{ $employee->organization }}';
		var present_department = '{{ $employee->department }}';
		var present_section = '{{ $employee->section }}';
	
		function load_structures()
        {
            $.ajax({
                url: '/partials/structure',
                method: "GET", 
                data: {id:id, organizations:'organizations'},
                success: function (data) {
					
                    $(data.organizations).each(function(index, organization) {
						if(organization !== present_organization){
							 $("#organization").append(new Option(organization));
						}
                    });
					
					
					var organization = $('#organization').val();
					$.ajax({
						url: '/partials/structure',
						method: "GET", 
						data: {id:id, organization:organization},
						success: function(data){
							$(data.departments).each(function(index, department) {
								if(department.name !== present_department){
									$("#department").append(new Option(department.name));
								}
							});
							
							var department = $('#department').val();
							$.ajax({
								url: '/partials/structure',
								method: "GET", 
								data: {id:id, department:department},
								success: function(data){
									$(data.sections).each(function(index, section) {
										if(section.name !== present_section){
											$("#section").append(new Option(section.name));
										}
									});
								}
							});
						}
					});
                }
            });
        }
		
		$(document).ready(function(){
        
        load_structures();

		$("#organization").change(function() {
			$("#department").empty();
            $("#section").empty();
            $("#address_name").empty();
			var organization = $('#organization').val();
			$.ajax({
				url: '/partials/structure',
				method: "GET", 
				data: {id:id, organization:organization},
				success: function(data){
					$("#department").empty();
					$(data.departments).each(function(index, department) {
						if(department.name !== present_department){
							$("#department").append(new Option(department.name));
						}
					});
					
					var department = $('#department').val();
					$.ajax({
						url: '/partials/structure',
						method: "GET", 
						data: {id:id, department:department},
						success: function(data){
							$("#section").empty();
							$(data.sections).each(function(index, section) {
								if(section.name !== present_section){
									$("#section").append(new Option(section.name));
								}
							});
						}
					});
				}
			});
		});
        
		
		$("#department").change(function() {
			$("#section").empty();
            $("#address_name").empty();
			var department = $('#department').val();
			$.ajax({
				url: '/partials/structure',
				method: "GET", 
				data: {id:id, department:department},
				success: function(data){
					$("#section").empty();
					$(data.sections).each(function(index, section) {
						if(section.name !== present_section){
							$("#section").append(new Option(section.name));
						}
					});
				}
			});			
		});
		
		$("#add_usbtoken").click(function(e) {
			e.preventDefault();
			$('#add_unallocated_usb_token').modal({ backdrop: 'static', keyboard: false })
				.on('click', '#add_selected_usb_token', function(){
					var selected_usbtoken = $('#selected_usb_token').val();
					$.ajax({
						url: '/partials/structure',
						method: "GET", 
						data: {id:id, selected_usbtoken:selected_usbtoken},
						success: function(data){
							window.location.reload(true);
						}
					});
					
					$('#add_unallocated_usb_token').modal('hide');
					
				});
			});	
			
			$("#delete_employee").click(function(e) {
				e.preventDefault();
				$('#confirm').modal({ backdrop: 'static', keyboard: false })
					.on('click', '#delete-btn', function(){
						var reason = $('#reason').val();
						$.ajax({
							url: '/partials/structure',
							method: "GET", 
							data: {id:id, reason: reason, delete_employee:'delete_employee'},
						});
						
						$('#confirm').modal('hide');	
						window.location.href = "http://assetmanager.dev";
				});
				$('#alert').addClass("alert alert-success").html('Deleted succesfully');
				
			});
		
	});
	
	</script>
@stop