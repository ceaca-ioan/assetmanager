@extends('templates.default')

@section('content')
	@if(!$personalphone)
		<p>Personal phone not found</p>
	@else
		<table class='table table-bordered table-hover'>
			<tr class="success">
				<th>Personal phone ID</th>
				<th>Employee ID</th>
				<th>Mark</th>
				<th>Model</th>
				<th>Notes</th>
			</tr>	
			<tr>
				<td>{{ $personalphone->id }}</td>
				<td><div>
				<a href="{{ route('employees.show', ['id' => $personalphone->employee_id]) }}" class="td_a">{{ $personalphone->employee_id }}</a>
				</div></td>
				<td>{{ $personalphone->mark }}</td>
				<td>{{ $personalphone->model }}</td>
				<td>{{ $personalphone->notes }}</td>
			</tr>
		</table>
	@endif
@stop