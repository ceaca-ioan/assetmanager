@extends('templates.default')
@section('scripts')
	<script>
	$( function() {
		var mark_list = {!! json_encode($mark_list) !!};
		$( "#mark" ).autocomplete({
			source: mark_list
		});
		
		var model_list = {!! json_encode($model_list) !!};
		$( "#model" ).autocomplete({
			source: model_list
		});
		
		var provenance_list = {!! json_encode($provenance_list) !!};
		$( "#provenance" ).autocomplete({
			source: provenance_list
		});
	});
	</script>
@stop
@section('content')
	@if(!$networkprinter)
		<p>Network printer not found</p>
	@else
		@include('modals/delete_confirmation_with_reason')
		<form method="POST" action="/networkprinters/{{ $networkprinter->id }}">
		<table class='table table-bordered table-hover'>
			<tr class="success">
				<th>Id</th>
				<th>IP</th>
				<th>Name</th>
				<th>CIS</th>
				<th>Mark</th>
				<th>Model</th>
			</tr>	
			<tr>
				<td><input type="text" name="id" readonly="readonly" value="{{ $networkprinter->id }}"></td>
				<td><input type="text" name="ip" value="{{ $networkprinter->ip }}"></td>
				<td><input type="text" name="name" value="{{ $networkprinter->name }}"></td>
				<td>
				<select id="cis" name="cis_name">
					<option selected>{{ $networkprinter->cis_name }}</option>
				</select>
				</td>
				<td><input type="text" name="mark" id="mark" value="{{ $networkprinter->mark }}"></td>
				<td><input type="text" name="model" id="model" value="{{ $networkprinter->model }}"></td>
			</tr>
			
			<tr class="success">
				<th>Inventory no</th>
				<th>Organization</th>
				<th>Department</th>
				<th>Section</th>
				<th>Address name</th>
				<th>Room</th>
			</tr>	
			<tr>
				<td><input type="text" name="inv_no" value="{{ $networkprinter->inv_no }}"></td>
				<td>
				<select id="organization" name="organization">
					<option selected>{{ $networkprinter->organization }}</option>
				</select>
				<td>
				<select id="department" name="department">
					<option selected>{{ $networkprinter->department }}</option>
				</select>
				</td>
				<td>
				<select id="section" name="section">
					<option selected>{{ $networkprinter->section }}</option>
				</select>
				</td>
				<td>
				<select id="address_name" name="address_name">
					<option selected>{{ $networkprinter->address_name }}</option>
				</select>
				</td>
				<td><input type="text" name="room" value="{{ $networkprinter->room }}"></td>
			</tr>
			
			<tr class="success">
				<th>SN</th>
				<th>MAC</th>
				<th>Provenance</th>
				<th>AI</th>
				<th>History</th>
				<th>Notes</th>
			</tr>	
			<tr>
				<td><input type="text" name="sn" value="{{ $networkprinter->sn }}"></td>
				<td><input type="text" name="mac" value="{{ $networkprinter->mac }}"></td>
				<td><input type="text" name="provenance" id="provenance" value="{{ $networkprinter->provenance }}"></td>
				<td>
				<label><input name="ai" type="radio" value=1 @if ($networkprinter->ai === 1) checked="checked" @endif><span>Yes</span></label>
				<label><input name="ai" type="radio" value=0 @if ($networkprinter->ai === 0) checked="checked" @endif><span>No</span></label>
				</td>
				<td><input type="text" name="history" value="{{ $networkprinter->history }}"></td>
				<td><input type="text" name="notes" value="{{ $networkprinter->notes }}"></td>
			</tr>
		</table>
		<table class="table_update">
		<tr>
			<td>
				<button id="delete_networkprinter" class="btn btn-danger">Delete</button>
			</td>
			<td>
				<input type="hidden" name="_token" value="{{ csrf_token() }}">    
				<button type="submit" class="btn btn-success pull-right">Update</button>
			</td>
		</tr>
		</table>
		</form>
		<p>Computers:</p>
		<ul class="ul_btn">
			@foreach($networkprinter->computers as $computer)
				<li><a href="{{ route('computers.edit', ['id' => $computer->id]) }}" class="btn btn-default min_w_150">{{ $computer->id }}</a></li>
			@endforeach
		</ul>
	@endif

	<script>
		var token = '{{ Session::token() }}';
		var id = '{{ $networkprinter->id }}';
		var present_organization = '{{ $networkprinter->organization }}';
		var present_department = '{{ $networkprinter->department }}';
		var present_section = '{{ $networkprinter->section }}';
		var present_cis = '{{ $networkprinter->cis_name }}';
		
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
			
			load_structures();
			load_cis();
			
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
								
								var section = $('#section').val();
								$.ajax({
									url: '/partials/structure',
									method: "GET", 
									data: {id:id, section:section},
									success: function(data){
										$("#address_name").append(new Option(data.address.name))
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
					
					var section = $('#section').val();
					$.ajax({
						url: '/partials/structure',
						method: "GET", 
						data: {id:id, section:section},
						success: function(data){
							$("#address_name").append(new Option(data.address.name))
						}
					});
				}
			});			
		});
		
		$("#section").change(function() {
			$("#address_name").empty();
			var section = $('#section').val();
			$.ajax({
				url: '/partials/structure',
				method: "GET", 
				data: {id:id, section:section},
				success: function(data){
					$("#address_name").append(new Option(data.address.name))
				}
			});			
		});
			
		$("#delete_networkprinter").click(function(e) {
				e.preventDefault();
				$('#confirm').modal({ backdrop: 'static', keyboard: false })
					.on('click', '#delete-btn', function(){
						var reason = $('#reason').val();
						$.ajax({
							url: '/partials/structure',
							method: "GET", 
							data: {id:id, reason: reason, delete_networkprinter:'delete_networkprinter'},
						});
						
						$('#confirm').modal('hide');
						
						window.location.href = "http://assetmanager.dev";
						
				});
				$('#alert').addClass("alert alert-success").html('Succesfully deleted');
				
		});
			
			
		});
	
	
	</script>
	
@stop


