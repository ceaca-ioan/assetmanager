@extends('templates.default')

@section('content')
	@if(!$peripheral)
		<p>Peripheral not found</p>
	@else
		<table class='table table-bordered table-hover'>
			<tr class="success">
				<th>Peripheral ID</th>
				<th>Type</th>
				<th>Mark</th>
			</tr>	
			<tr>
				<td>{{ $peripheral->id }}</td>
				<td>{{ $peripheral->type }}</td>
				<td>{{ $peripheral->mark }}</td>
			</tr>
			<tr class="success">
				<th>Model</th>
				<th>SN</th>
				<th>Destination</th>
			</tr>
			<tr>
				<td>{{ $peripheral->model }}</td>
				<td>{{ $peripheral->sn }}</td>
				<td>{{ $peripheral->destination }}</td>
			</tr>
			<tr class="success">
				<th colspan="3" >History</th>
			</tr>
			<tr>
				<td colspan="3">{{ $peripheral->history }}</td>
			</tr>
		</table>
	@endif
@stop