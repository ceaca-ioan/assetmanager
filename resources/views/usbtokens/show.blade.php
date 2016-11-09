@extends('templates.default')

@section('content')
	@if(!$usbtoken)
		<p>USB token not found</p>
	@else
		<table class='table table-bordered table-hover'>
			<tr class="success">
				<th>USB token ID</th>
				<th>Mark/Model</th>
				<th>Classification level</th>
				<th>Employee id</th>
			</tr>	
			<tr>
				<td>{{ $usbtoken->id }}</td>
				<td>{{ $usbtoken->mark_model }}</td>
				<td>{{ $usbtoken->classification_level }}</td>
				<td><a href="{{ route('employees.show', ['id' => $usbtoken->employee_id]) }}" class="td_a">{{ $usbtoken->employee_id }}</a></td>
			</tr>
			<tr class="success">
				<th>Registration no</th>
				<th>Registration date</th>
				<th>History</th>
				<th>Notes</th>
			</tr>	
			<tr>
				<td>{{ $usbtoken->registration_no }}</td>
				<td>{{ $usbtoken->registration_date }}</td>
				<td>{{ $usbtoken->history }}</td>
				<td>{{ $usbtoken->notes }}</td>
			</tr>
		</table>
	@endif
@stop