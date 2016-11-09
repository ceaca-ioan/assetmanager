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
	 
	@if(!$computer)
		<p>Computer not found</p>
	@else
		@include('modals/add_existing_account')
		@include('modals/add_existing_networkprinter')
		@include('modals/add_unallocated_peripheral')
		@include('modals/delete_confirmation_with_reason')
		@include('modals/remove_confirmation')
		<form method="POST" action="/computers/{{ $computer->id }}">
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
					<option selected>{{ $computer->organization }}</option>
				</select>
				<td>
				<select id="department" name="department">
					<option selected>{{ $computer->department }}</option>
				</select>
				</td>
				<td>
				<select id="section" name="section">
					<option selected>{{ $computer->section }}</option>
				</select>
				</td>
				<td>
				<select id="cis" name="cis_name">
					<option selected>{{ $computer->cis_name }}</option>
				</select>
				</td>
				<td><input type="text" name="type" readonly="readonly" value="{{ $computer->type }}"></td>
				<td>
				<select id="ip" name="ip">
					<option selected>{{ $computer->ip }}</option>
				</select>
				</td>
				<td><input type="text" name="name" value="{{ $computer->name }}"></td>
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
				<td><input type="text" name="id" readonly="readonly" value="{{ $computer->id }}"></td>
				<td><input type="text" name="inv_no" value="{{ $computer->inv_no }}"></td>
				<td><input type="text" name="holder" value="{{ $computer->holder }}"></td>
				
				<td><input type="text" name="provenance" id="provenance" value="{{ $computer->provenance }}"></td>
				<td>
				<label><input name="ai" type="radio" value=1 @if ($computer->ai === 1) checked="checked" @endif><span>Yes</span></label>
				<label><input name="ai" type="radio" value=0 @if ($computer->ai === 0) checked="checked" @endif><span>No</span></label>
				</td>
				<td>
				<select id="address_name" name="address_name">
					<option selected>{{ $computer->address_name }}</option>
				</select>
				</td>
				<td><input type="text" name="room" value="{{ $computer->room }}"></td>
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
				<td><input type="text" name="hdd_reg_no" value="{{ $computer->hdd_reg_no }}"></td>
				<td><input type="date" name="hdd_reg_date" required="required" value="{{ $computer->hdd_reg_date }}"></td>
				<td><input type="text" name="hdd_mark_and_model" id="hdd_mark_and_model" value="{{ $computer->hdd_mark_and_model }}"></td>
				<td><input type="text" name="hdd_sn" value="{{ $computer->hdd_sn }}"></td>
				<td><input type="text" name="hdd_capacity" value="{{ $computer->hdd_capacity }}"></td>
				<td><input type="text" name="hdd_interface" id="hdd_interface" value="{{ $computer->hdd_interface }}"></td>
				<td><input type="text" name="optical_drive" id="optical_drive" value="{{ $computer->optical_drive }}"></td>
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
				<td><input type="text" name="processor_type" id="processor_type" value="{{ $computer->processor_type }}"></td>
				<td><input type="text" name="processor_frequency" value="{{ $computer->processor_frequency }}"></td>
				<td><input type="text" name="motherboard" id="motherboard" value="{{ $computer->motherboard }}"></td>
				<td><input type="text" name="sn" value="{{ $computer->sn }}"></td>
				<td><input type="text" name="ram_capacity" value="{{ $computer->ram_capacity }}"></td>
				<td><input type="text" name="ram_type" id="ram_type" value="{{ $computer->ram_type }}"></td>
				<td>
				<div class="ui-widget">
				  <input type="text" name="os" id="os" value="{{ $computer->os }}">
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
				<td><input type="text" name="mac" value="{{ $computer->mac }}"></td>
				<td><textarea rows="1" name="optical_drive_rights">{{ trim($computer->optical_drive_rights) }}</textarea></td>
				<td><textarea rows="1" name="soft_rights">{{ trim($computer->soft_rights) }}</textarea></td>
				<td><textarea rows="1" name="privileged_accounts"> {{ trim($computer->privileged_accounts) }}</textarea></td>
				<td><textarea rows="1" name="usb_rights">{{ trim($computer->usb_rights) }}</textarea></td>
				<td><textarea rows="1" name="history">{{ trim($computer->history) }}</textarea></td>
				<td><textarea rows="1" name="notes">{{ trim($computer->notes) }}</textarea></td>
			</tr>
		</table>
		<table class="table_update">
		<tr>
			<td>
				<button id="delete_computer" class="btn btn-danger">Delete</button>
			</td>
			<td>
				<input type="hidden" name="_token" value="{{ csrf_token() }}">    
				<button type="submit" class="btn btn-success pull-right">Update</button>
			</td>
		</tr>
		</table>

		<table class='table table-bordered table-hover'>
			<tr class="success">
				<th style="width: 34%">Accounts
				
				<div class='pull-right'>
					<a type='button' class='btn btn-xs btn-primary' id="add_account" title='Add new account to this computer'><i class="fa fa-plus" aria-hidden="true"></i></a>
				</div>
				</th>
				<th style="width: 33%">Peripherals
				<div class='pull-right'>
					<a type='button' class='btn btn-xs btn-primary' id="add_peripheral" title='Add new peripheral to this computer'><i class="fa fa-plus" aria-hidden="true"></i></a>
				</div>
				</th>
				<th style="width: 33%">Network printers
				<div class='pull-right'>
					<a type='button' class='btn btn-xs btn-primary' id="add_networkprinter" title='Add new network printer to this computer'><i class="fa fa-plus" aria-hidden="true"></i></a>
				</div>
				</th>
			</tr>
			<tr>
				<td>
				@if($computer->accounts->count() >=1)
					@foreach($computer->accounts as $account)
					<div class="margins_5 btn-group">	
						<a href="{{ route('accounts.edit', ['id' => $account->id]) }}" class='btn btn-default min_w_150 no_radius_right' role='button'>{{ $account->id }}</a>
						<button data-account="{{ $account->id }}" class='btn btn-danger no_radius_left remove_account'><i class="fa fa-trash-o" aria-hidden="true" title="Remove account from this computer"></i></button>
					</div><br />	
					@endforeach
				@else																																														
					<p> No results</p>
				@endif
				</td>
				<td>
				@if($computer->peripherals->count() >=1)
					@foreach($computer->peripherals as $peripheral)
						<div class="margins_5 btn-group">
							<a href="{{ route('peripherals.edit', ['id' => $peripheral->id]) }}" class='btn btn-default min_w_150' role='button'>{{ $peripheral->id }} </a>
							<button data-peripheral="{{ $peripheral->id }}" class='btn btn-danger no_radius_left remove_peripheral'><i class="fa fa-trash-o" aria-hidden="true" title="Remove peripheral from this computer"></i></button>
						</div><br />
					@endforeach
				@else																																														
					<p> No results</p>
				@endif
				</td>
				<td>
				@if($computer->networkprinters->count() >=1)
					@foreach($computer->networkprinters as $networkprinter)
						<div class="margins_5 btn-group">
							<a href="{{ route('networkprinters.edit', ['id' => $networkprinter->id]) }}" class='btn btn-default min_w_150' role='button'>{{ $networkprinter->id }} </a>
							<button data-networkprinter="{{ $networkprinter->id }}" class='btn btn-danger no_radius_left remove_networkprinter'><i class="fa fa-trash-o" aria-hidden="true" title="Remove network printer from this computer"></i></button>
						</div><br />
					@endforeach
				@else																																														
					<p> No results</p>
				@endif
				</td>
			</tr>
		</table>
	@endif
	
	
	<script>
		var token = '{{ Session::token() }}';
		var id = '{{ $computer->id }}';
		var present_organization = '{{ $computer->organization }}';
		var present_department = '{{ $computer->department }}';
		var present_section = '{{ $computer->section }}';
		var present_cis = '{{ $computer->cis_name }}';
		var present_ip = '{{ $computer->ip }}';
		
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
									
									var section = $('#section').val();
									var cis_structures = $('#cis').val();
									$.ajax({
										url: '/partials/structure',
										method: "GET", 
										data: {id:id, section:section, cis_structures:cis_structures},
										success: function(data){
											$(data.ipaddresses).each(function(index, ipaddress) {
												if(ipaddress.ip !== present_ip){
													$("#ip").append(new Option(ipaddress.ip));
												}
											});
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
		
		// $("#os").keyup(function() {
			// var os = $(this).val(); 
			// $.post('/ajax/keyup', {os:os, _token: token}, function(data){
				
				// console.log(data);
			// });
			
		// });
		
		$("#organization").change(function() {
			$("#department").empty();
            $("#section").empty();
			$("#ip").empty();
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
							var cis_structures = $('#cis').val();
							$.ajax({
								url: '/partials/structure',
								method: "GET", 
								data: {id:id, section:section, cis_structures:cis_structures},
								success: function(data){
									$("#address_name").append(new Option(data.address.name))
									$(data.ipaddresses).each(function(index, ipaddress) {
										$("#ip").append(new Option(ipaddress.ip));
									});
								}
							});
							
							
						}
					});
				}
			});
		});
        
		
		$("#department").change(function() {
			$("#section").empty();
			$("#ip").empty();
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
					var cis_structures = $('#cis').val();
					$.ajax({
						url: '/partials/structure',
						method: "GET", 
						data: {id:id, section:section, cis_structures:cis_structures},
						success: function(data){
							$("#address_name").append(new Option(data.address.name))
							$(data.ipaddresses).each(function(index, ipaddress) {
								$("#ip").append(new Option(ipaddress.ip));
							});
						}
					});
				}
			});			
		});
		
		$("#section").change(function() {
			$("#ip").empty();
			$("#address_name").empty();
			var section = $('#section').val();
			var cis_structures = $('#cis').val();
			$.ajax({
				url: '/partials/structure',
				method: "GET", 
				data: {id:id, section:section, cis_structures:cis_structures},
				success: function(data){
					$("#address_name").append(new Option(data.address.name))
					$(data.ipaddresses).each(function(index, ipaddress) {
						$("#ip").append(new Option(ipaddress.ip));
					});
				}
			});			
		});

		$("#cis").change(function() {
			$("#ip").empty();
			var cis_changed = $('#cis').val();
			var section_cis = $('#section').val();
			$.ajax({
				url: '/partials/structure',
				method: "GET", 
				data: {id:id, cis_changed:cis_changed, section_cis:section_cis},
				success: function(data){
					if(data.ipaddresses.length >= 1){
						$(data.ipaddresses).each(function(index, ipaddress) {
							$("#ip").append(new Option(ipaddress.ip));
						});
					} else {
						$("#ip").append(new Option('no ip'));
					}
						
					
				}
			});			
		});
            
		$("#delete_computer").click(function(e) {
				e.preventDefault();
				$('#confirm').modal({ backdrop: 'static', keyboard: false })
					.on('click', '#delete-btn', function(){
						var reason = $('#reason').val();
						$.ajax({
							url: '/partials/structure',
							method: "GET", 
							data: {id:id, reason: reason, delete_computer:'delete_computer'},
						});
						
						$('#confirm').modal('hide');
						
						window.location.href = "http://assetmanager.dev";
						
				});
				$('#alert').addClass("alert alert-success").html('Succesfully deleted');
				
		});
		
		$("#add_account").click(function(e) {
			e.preventDefault();
			$('#add_existing_account').modal({ backdrop: 'static', keyboard: false })
				.on('click', '#add_selected_account', function(){
					var selected_account = $('#selected_account').val();
					$.ajax({
						url: '/partials/structure',
						method: "GET", 
						data: {id:id, selected_account:selected_account},
						success: function(data){
							window.location.reload(true);
							// console.log(data);
						}
					});
					
					$('#add_existing_account').modal('hide');
					
				});
		});	
		
		$("#add_networkprinter").click(function(e) {
			e.preventDefault();
			$('#add_existing_networkprinter').modal({ backdrop: 'static', keyboard: false })
				.on('click', '#add_selected_networkprinter', function(){
					var selected_networkprinter = $('#selected_networkprinter').val();
					$.ajax({
						url: '/partials/structure',
						method: "GET", 
						data: {id:id, selected_networkprinter:selected_networkprinter},
						success: function(data){
							window.location.reload(true);
						}
					});
					
					$('#add_existing_networkprinter').modal('hide');
					
				});
		});	
		
		$("#add_peripheral").click(function(e) {
			e.preventDefault();
			$('#add_unallocated_peripheral').modal({ backdrop: 'static', keyboard: false })
				.on('click', '#add_selected_peripheral', function(){
					var selected_peripheral = $('#selected_peripheral').val();
					$.ajax({
						url: '/partials/structure',
						method: "GET", 
						data: {id:id, selected_peripheral:selected_peripheral},
						success: function(data){
							window.location.reload(true);
						}
					});
					
					$('#add_unallocated_peripheral').modal('hide');
					
				});
		});	
		
		$(".remove_account").click(function(e) {
			e.preventDefault();
			var account_id=$(this).data("account"); 
			$('#confirm_remove').modal({ backdrop: 'static', keyboard: false })
				.on('click', '#remove-btn', function(){
					$.ajax({
						url: '/partials/structure',
						method: "GET", 
						data: {id:id, remove_account:'remove_account', account_id:account_id},
						success: function(data){
							window.location.reload(true);
						}
					});
					
					$('#confirm_remove').modal('hide');
					
				});
		});	
		
		$(".remove_networkprinter").click(function(e) {
			e.preventDefault();
			var networkprinter_id=$(this).data("networkprinter"); 
			$('#confirm_remove').modal({ backdrop: 'static', keyboard: false })
				.on('click', '#remove-btn', function(){
					$.ajax({
						url: '/partials/structure',
						method: "GET", 
						data: {id:id, remove_networkprinter:'remove_networkprinter', networkprinter_id:networkprinter_id},
						success: function(data){
							window.location.reload(true);
						}
					});
					
					$('#confirm_remove').modal('hide');
					
				});
		});	
		
		$(".remove_peripheral").click(function(e) {
			e.preventDefault();
			var peripheral_id=$(this).data("peripheral"); 
			$('#confirm_remove').modal({ backdrop: 'static', keyboard: false })
				.on('click', '#remove-btn', function(){
					$.ajax({
						url: '/partials/structure',
						method: "GET", 
						data: {id:id, remove_peripheral:'remove_peripheral', peripheral_id:peripheral_id},
						success: function(data){
							window.location.reload(true);
						}
					});
					
					$('#confirm_remove').modal('hide');
					
				});
		});	
		
				
		});
			
	</script>
@stop