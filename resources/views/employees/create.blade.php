@extends('templates.default')

@section('content')
	<form method="POST" action="/employees">
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
			<td><input type="text" name="id"></td>
			<td><input type="text" name="first_name"></td>
			<td><input type="text" name="last_name"></td>
			<td><input type="text" name="father_last_name"></td>
			<td>
				<select id="rank" name="rank">
				@foreach ($ranks as $rank)
					<option>{{$rank}}</option>
				@endforeach
			</select>
			</td>
			<td>
			<select id="position" name="position">
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
				</select>
				<td>
				<select id="department" name="department">
				</select>
				</td>
				<td>
				<select id="section" name="section">
				</select>
				</td>
				<td><input type="text" name="work_phone_no"></td>
				<td><input type="text" name="personal_phone_no"></td>
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