@extends('templates.default')

@section('content')
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
				<td>{{ $employee->id }}</td>
				<td>{{ $employee->first_name }}</td>
				<td>{{ $employee->last_name }}</td>
				<td>{{ $employee->father_last_name }}</td>
				<td>{{ $employee->rank }}</td>
				<td>{{ $employee->position }}</td>
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
				<td>{{ $employee->organization }}</td>
				<td>{{ $employee->department }}</td>
				<td>{{ $employee->section }}</td>
				<td>{{ $employee->work_phone_no }}</td>
				<td>{{ $employee->personal_phone_no }}</td>
				<td>{{ $employee->notes }}</td>
			</tr>
		</table>
		
		<table class='table table-bordered table-hover'>
			<tr class="success">
				<th>Accounts</th>
				<th>Computers</th>
				<th>USB tokens</th>
				<th>Personal phones</th>
				<th>Authorizations</th>
			</tr>
			<tr>
				<td>
					@if($employee->accounts->count() >=1)
						@foreach($employee->accounts as $account)
							<div class="margins_5">
								<a href="{{ route('accounts.show', ['id' => $account->id]) }}" class='btn btn-default min_w_150' role='button'>{{ $account->id }} </a>
							</div>
						@endforeach
					@else																																														
						<p> No results</p>
					@endif
				</td>
				<td>
					@if($employee->accounts->count() >=1)
						@foreach($employee->accounts as $account)
							@foreach($account->computers as $computer)
							<div class="margins_5">
								<a href="{{ route('computers.show', ['id' => $computer->id]) }}" class='btn btn-default min_w_150' role='button'> {{ $computer->id }} ({{ $account->id }})</a>
							</div>
							@endforeach
						@endforeach
					@else																																														
						<p> No results</p>
					@endif
				</td>
				<td>
					@if($employee->usbtokens->count() >=1)
						@foreach($employee->usbtokens as $usbtoken)
							<div class="margins_5">
								<a href="{{ route('usbtokens.show', ['id' => $usbtoken->id]) }}" class='btn btn-default min_w_150' role='button'> {{ $usbtoken->id }} </a>
							</div>
						@endforeach
					@else																																														
						<p> No results</p>
					@endif
				</td>
				<td>
					@if($employee->personalphones->count() >=1)
						@foreach($employee->personalphones as $personalphone)
							<div class="margins_5">
								<a href="{{ route('personalphones.show', ['id' => $personalphone->id]) }}" class='btn btn-default min_w_150' role='button'> {{ $personalphone->mark }} - {{ $personalphone->model }} </a>
							</div>
						@endforeach
					@else																																														
						<p> No results</p>
					@endif
				</td>
				<td>
					@if($employee->authorizations->count() >=1)
						@foreach($employee->authorizations as $authorization)
							<div class="margins_5">
								<a href="{{ route('authorizations.show', ['id' => $authorization->id]) }}" class='btn btn-default min_w_150' role='button'> {{ $authorization->sn }} </a>
							</div>
						@endforeach
					@else																																														
						<p> No results</p>
					@endif
				</td>
			</tr>
		</table>
@stop