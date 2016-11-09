@extends('templates.default')

@section('content')
	@if(!$networkprinter)
		<p>Network printer not found</p>
	@else
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
				<td>{{ $networkprinter->id }}</td>
				<td>{{ $networkprinter->ip }}</td>
				<td>{{ $networkprinter->name }}</td>
				<td>{{ $networkprinter->cis_name }}</td>
				<td>{{ $networkprinter->mark }}</td>
				<td>{{ $networkprinter->model }}</td>
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
				<td>{{ $networkprinter->inv_no }}</td>
				<td>{{ $networkprinter->organization }}</td>
				<td>{{ $networkprinter->department }}</td>
				<td>{{ $networkprinter->section }}</td>
				<td>{{ $networkprinter->address_name }}</td>
				<td>{{ $networkprinter->room }}</td>
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
				<td>{{ $networkprinter->sn }}</td>
				<td>{{ $networkprinter->mac }}</td>
				<td>{{ $networkprinter->provenance }}</td>
				<td>{{ $networkprinter->ai }}</td>
				<td>{{ $networkprinter->history }}</td>
				<td>{{ $networkprinter->notes }}</td>
			</tr>
		</table>
		<p>Computers:</p>
		<ul class="ul_btn">
			@foreach($networkprinter->computers as $computer)
				<li><a href="{{ route('computers.show', ['id' => $computer->id]) }}" class="btn btn-default min_w_150">{{ $computer->id }}</a></li>
			@endforeach
		</ul>
	@endif
@stop