@extends('templates.default')

@section('content')
	@if(!$computer)
		<p>Computer not found</p>
	@else
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
				<td>{{ $computer->organization }}</td>
				<td>{{ $computer->department }}</td>
				<td>{{ $computer->section }}</td>
				<td>{{ $computer->cis_name }} </td>
				<td>{{ $computer->type }}</td>
				<td>{{ $computer->ip }}</td>
				<td>{{ $computer->name }}</td>
				
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
				<td>{{ $computer->id }}</td>
				<td>{{ $computer->inv_no }}</td>
				<td>{{ $computer->holder }}</td>
				<td>{{ $computer->provenance }}</td>
				<td>@if ($computer->ai === 1) Yes @elseif ($computer->ai === 0) No @else undefined @endif </td>
				<td>{{ $computer->address_name }}</td>
				<td>{{ $computer->room }}</td>
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
				<td>{{ $computer->hdd_reg_no }}</td>
				<td>{{ $computer->hdd_reg_date }}</td>
				<td>{{ $computer->hdd_mark_and_model }}</td>
				<td>{{ $computer->hdd_sn }}</td>
				<td>{{ $computer->hdd_capacity }}</td>
				<td>{{ $computer->hdd_interface }}</td>
				<td>{{ $computer->optical_drive }} </td>
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
				<td>{{ $computer->processor_type }}</td>
				<td>{{ $computer->processor_frequency }}</td>
				<td>{{ $computer->motherboard }}</td>
				<td>{{ $computer->sn }}</td>
				<td>{{ $computer->ram_capacity }}</td>
				<td>{{ $computer->ram_type }}</td>
				<td>{{ $computer->os }} </td>
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
				<td>{{ $computer->mac }} </td>
				<td>{{ $computer->optical_drive_rights }}</td>
				<td>{{ $computer->soft_rights }}</td>
				<td>{{ $computer->privileged_accounts }}</td>
				<td>{{ $computer->usb_rights }}</td>
				<td>{{ $computer->history }}</td>
				<td>{{ $computer->notes }} </td>
			</tr>
		</table>
		
		
		
		<table class='table table-bordered table-hover'>
			<tr class="success">
				<th>Accounts</th>
				<th>Peripherals</th>
				<th>Network printers</th>
			</tr>
			<tr>
				<td>
				@if($computer->accounts->count() >=1)
					@foreach($computer->accounts as $account)
					<div class="margins_5">	
						<a href="{{ route('accounts.show', ['id' => $account->id]) }}" class='btn btn-default min_w_150' role='button'>{{ $account->id }}</a>
					</div>	
					@endforeach
				@else																																														
					<p> No results</p>
				@endif
				</td>
				<td>
				@if($computer->peripherals->count() >=1)
					@foreach($computer->peripherals as $peripheral)
						<div class="margins_5">
							<a href="{{ route('peripherals.show', ['id' => $peripheral->id]) }}" class='btn btn-default min_w_150' role='button'>{{ $peripheral->id }} </a>
						</div>
					@endforeach
				@else																																														
					<p> No results</p>
				@endif
				</td>
				<td>
				@if($computer->networkprinters->count() >=1)
					@foreach($computer->networkprinters as $networkprinter)
						<div class="margins_5">
							<a href="{{ route('networkprinters.show', ['id' => $networkprinter->id]) }}" class='btn btn-default min_w_150' role='button'>{{ $networkprinter->id }} </a><br />
						</div>
					@endforeach
				@else																																														
					<p> No results</p>
				@endif
				</td>
			</tr>
		</table>
	@endif
@stop