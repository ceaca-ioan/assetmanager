@extends('templates.default')

@section('content')
	@if(!$authorization)
		<p>Authorization not found</p>
	@else
		<table class='table table-bordered table-hover'>
			<tr class="success">
				<th>Serial Number</th>
				<th>Employee id</th>
				<th>Authorization level</th>
				<th>Issue date</th>
				<th>Expiry date</th>
			</tr>	
			<tr>
				<td>{{ $authorization->sn }}</td>
				<td><a href="{{ route('employees.show', ['id' => $authorization->employee_id]) }}" class="td_a">{{ $authorization->employee_id }}</a></td>
				<td>{{ $authorization->authorization_level }}</td>
				<td>{{ $authorization->issue_date }}</td>
				<td>{{ $authorization->expiry_date }}</td>
			</tr>
		</table>
	@endif
@stop