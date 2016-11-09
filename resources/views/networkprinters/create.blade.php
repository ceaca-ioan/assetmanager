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
	<form method="POST" action="/networkprinters">
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
			<td><input type="text" name="id"></td>
			<td><input type="text" name="ip"></td>
			<td><input type="text" name="name"></td>
			<td>
			<select id="cis" name="cis_name"></select>
			</td>
			<td><input type="text" name="mark" id="mark"></td>
			<td><input type="text" name="model" id="model"></td>
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
			<td><input type="text" name="inv_no"></td>
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
			<select id="address_name" name="address_name">
			</select>
			</td>
			<td><input type="text" name="room"></td>
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
			<td><input type="text" name="sn"></td>
			<td><input type="text" name="mac"></td>
			<td><input type="text" name="provenance" id="provenance"></td>
			<td>
			<label><input name="ai" type="radio" value=1><span>Yes</span></label>
			<label><input name="ai" type="radio" value=0><span>No</span></label>
			</td>
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


