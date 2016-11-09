@extends('templates.default')
@section('scripts')
	<script>
	$( function() {
		var provenance_list = {!! json_encode($provenance_list) !!};
		$( "#provenance" ).autocomplete({
			source: provenance_list
		});
		
		var os_list = {!! json_encode($os_list) !!};
		$( "#os" ).autocomplete({
			source: os_list
		});
		
		var hdd_mark_and_model_list = {!! json_encode($hdd_mark_and_model_list) !!};
		$( "#hdd_mark_and_model" ).autocomplete({
			source: hdd_mark_and_model_list
		});
		
		var hdd_interface_list = {!! json_encode($hdd_interface_list) !!};
		$( "#hdd_interface" ).autocomplete({
			source: hdd_interface_list
		});
		
		var optical_drive_list = {!! json_encode($optical_drive_list) !!};
		$( "#optical_drive" ).autocomplete({
			source: optical_drive_list
		});
		
		var motherboard_list = {!! json_encode($motherboard_list) !!};
		$( "#motherboard" ).autocomplete({
			source: motherboard_list
		});
		
		var ram_type_list = {!! json_encode($ram_type_list) !!};
		$( "#ram_type" ).autocomplete({
			source: ram_type_list
		});
		
		var processor_type_list = {!! json_encode($processor_type_list) !!};
		$( "#processor_type" ).autocomplete({
			source: processor_type_list
		});
		
	});
	</script>
@stop
@section('content')
	<form method="POST" action="/computers">
	<table class='table table-bordered table-hover'>
		<tr class="success">
			<th>Organization</th>
			<th>Department</th>
			<th>Section</th>
			<th>CIS</th>
			<th>Computer type</th>
			<th>IP</th>
			<th>Name</th>
			
		</tr>
		<tr>
			<td>
			<select id="organization" name="organization">
			</select>
			<td>
			<select id="department" name="department">
			</select>
			</td>
			<td>
			<select id="section" name="section">
			</select>
			</td>
			<td>
			<select id="cis" name="cis_name"></select>
			</td>
			<td>
			<label><input name="type" type="radio" value="Desktop"><span>D</span></label>
			<label><input name="type" type="radio" value="Laptop"><span>L</span></label>
			</td>
			<td><input type="text" name="ip"></td>
			<td><input type="text" name="name"></td>
		</tr>
		
		<tr class="success">
			<th>Id</th>
			<th>Inventory no</th>
			<th>Holder</th>
			<th>Provenance</th>
			<th>AI</th>
			<th>Address name</th>
			<th>Room</th>
		</tr>
		<tr>
			<td><input type="text" name="id"></td>
			<td><input type="text" name="inv_no"></td>
			<td><input type="text" name="holder"></td>
			<td><input type="text" name="provenance" id="provenance"></td>
			<td>
			<label><input name="ai" type="radio" value=1><span>Yes</span></label>
			<label><input name="ai" type="radio" value=0><span>No</span></label>
			</td>
			<td>
			<select id="address_name" name="address_name">
				
			</select>
			</td>
			<td><input type="text" name="room"></td>
		</tr>
		
		<tr class="success">
			<th>HDD registration no</th>
			<th>HDD registration date</th>
			<th>HDD mark/model</th>
			<th>HDD SN</th>
			<th>HDD capacity</th>
			<th>HDD interface</th>
			<th>Optical drive</th>
		</tr>
		<tr>
			<td><input type="text" name="hdd_reg_no"></td>
			<td><input type="date" name="hdd_reg_date"></td>
			<td><input type="text" name="hdd_mark_and_model" id="hdd_mark_and_model"></td>
			<td><input type="text" name="hdd_sn"></td>
			<td><input type="text" name="hdd_capacity"></td>
			<td><input type="text" name="hdd_interface" id="hdd_interface"></td>
			<td><input type="text" name="optical_drive" id="optical_drive"></td>
		</tr>
		
		<tr class="success">
			<th>Processor type</th>
			<th>Processor frequency</th>
			<th>Motherboard</th>
			<th>Computer SN</th>
			<th>RAM capacity</th>
			<th>RAM type</th>
			<th>OS</th>
		</tr>
		<tr>
			<td><input type="text" name="processor_type" id="processor_type"></td>
			<td><input type="text" name="processor_frequency"></td>
			<td><input type="text" name="motherboard" id="motherboard"></td>
			<td><input type="text" name="sn"></td>
			<td><input type="text" name="ram_capacity"></td>
			<td><input type="text" name="ram_type" id="ram_type"></td>
			<td>
			<div class="ui-widget">
			  <input type="text" name="os" id="os">
			</div>
			</td>
		</tr>
		
		<tr class="success">
			<th>MAC address</th>
			<th>Rights-optical drive</th>
			<th>Rights-soft</th>
			<th>Rights-accounts</th>
			<th>Rights-USB</th>
			<th>History</th>
			<th>Notes</th>
		</tr>
		<tr>
			<td><input type="text" name="mac"></td>
			<td><input type="text" name="optical_drive_rights"></td>
			<td><input type="text" name="soft_rights"></td>
			<td><input type="text" name="privileged_accounts"></td>
			<td><input type="text" name="usb_rights"></td>
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

		function load_structures()
        {
            $.ajax({
                url: '/partials/structure',
                method: "GET", 
                data: {organizations:'organizations'},
                success: function (data) {
					
                    $(data.organizations).each(function(index, organization) {
						$("#organization").append(new Option(organization));
                    });
					
					
					var organization = $('#organization').val();
					$.ajax({
						url: '/partials/structure',
						method: "GET", 
						data: {organization:organization},
						success: function(data){
							$(data.departments).each(function(index, department) {
								$("#department").append(new Option(department.name));
							});
							
							var department = $('#department').val();
							$.ajax({
								url: '/partials/structure',
								method: "GET", 
								data: {department:department},
								success: function(data){
									$(data.sections).each(function(index, section) {
										$("#section").append(new Option(section.name));
									});
									
									var section = $('#section').val();
									$.ajax({
										url: '/partials/structure',
										method: "GET", 
										data: {section:section},
										success: function(data){
											$("#address_name").append(new Option(data.address.name))
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
				data: {cis:'cis'},
				success: function(data){
					$(data.cis_names).each(function(index, cis) {
						$("#cis").append(new Option(cis));
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
				data: {organization:organization},
				success: function(data){
					$("#department").empty();
					$(data.departments).each(function(index, department) {
						$("#department").append(new Option(department.name));
					});
					
					var department = $('#department').val();
					$.ajax({
						url: '/partials/structure',
						method: "GET", 
						data: {department:department},
						success: function(data){
							$("#section").empty();
							$(data.sections).each(function(index, section) {
								$("#section").append(new Option(section.name));
							});
							
							var section = $('#section').val();
							$.ajax({
								url: '/partials/structure',
								method: "GET", 
								data: {section:section},
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
				data: {department:department},
				success: function(data){
					$("#section").empty();
					$(data.sections).each(function(index, section) {
						$("#section").append(new Option(section.name));
					});
					
					var section = $('#section').val();
					$.ajax({
						url: '/partials/structure',
						method: "GET", 
						data: {section:section},
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
				data: {section:section},
				success: function(data){
					$("#address_name").append(new Option(data.address.name))
				}
			});			
		});
            
	
				
	});
			
	</script>
@stop