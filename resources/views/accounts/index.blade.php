@extends('templates.default')

@section('content')
	@if(!$accounts->count())
		<caption>Accounts: no results</caption>
	@else
		<caption>Accounts: {{ $accounts->count() }} {{ $accounts->count() === 1 ? "result" : "results" }}</caption>
		<table class='table table-bordered table-hover'>
			<tr class="success">
				<th>Account ID</th>
				<th>Employee ID</th>
				<th>Account type</th>
				<th>CIS</th>
				<th>Approval no</th>
				<th>Approval date</th>
				<th>Status</th>
			</tr>
			@foreach($accounts as $account)
				<tr>
					<td>
					@if (Auth::user()->canCUD())
						<a href="{{ route('accounts.edit', ['id' => $account->id]) }}" class="td_a">
					@else 
						<a href="{{ route('accounts.show', ['id' => $account->id]) }}" class="td_a">
					@endif
					{{ $account->id }}
					</a>
					</td>
					<td>
					@if (Auth::user()->canCUD())
						<a href="{{ route('employees.edit', ['id' => $account->employee_id]) }}" class="td_a">
					@else 
						<a href="{{ route('employees.show', ['id' => $account->employee_id]) }}" class="td_a">
					@endif
					{{ $account->employee_id }}
					</a>
					</td>
					<td>{{ $account->type }}</td>
					<td>{{ $account->cis_name }}</td>
					<td>{{ $account->approval_number }}</td>
					<td>{{ $account->approval_date }}</td>
					<td>@if ($account->status === 1)  <span>Enabled</span> @else <span class="red">Disabled</span> @endif</td>
				</tr>
			@endforeach
		</table>
	@endif
@stop