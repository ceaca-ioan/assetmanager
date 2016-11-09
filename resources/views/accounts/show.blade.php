@extends('templates.default')

@section('content')
	<table class='table table-bordered table-hover'>
			<tr class="success">
				<th>Account ID</th>
				<th>Employee ID</th>
				<th>Account type</th>
				<th>CIS</th>
			</tr>	
			<tr>
				<td>{{ $account->id }}</td>
				<td><a href="{{ route('employees.show', ['id' => $account->employee_id]) }}" class="td_a">{{ $account->employee_id }}</a></td>
				<td>{{ $account->type }}</td>
				<td>{{ $account->cis_name }}</td>
			</tr>	
			
			<tr class="success">
				<th>Approval no</th>
				<th>Approval date</th>
				<th>Status</th>
				<th>Notes</th>
			</tr>
			<tr>
				<td>{{ $account->approval_number }}</td>
				<td>{{ $account->approval_date }}</td>
				<td>{{ $account->status }}</td>
				<td>{{ $account->notes }}</td>
			</tr>
		</table>
@stop