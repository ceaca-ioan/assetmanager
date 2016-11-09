@extends('templates.default')

@section('content')
	@if(!$employees->count())
		<caption>Employees: no results</caption>
	@else
		<caption>Employees: {{ $employees->count() }} {{ $employees->count() === 1 ? "result" : "results" }}</caption>
		<table class='table table-bordered table-hover'>
			<tr class="success">
				<th>Employee ID</th>
				<th>First name</th>
				<th>Last name</th>
				<th>Department</th>
				<th>Section</th>
				<th>Work phone no</th>
			</tr>
			@foreach($employees as $employee)
				<tr>
					<td>
					@if (Auth::user()->canCUD())
						<a href="{{ route('employees.edit', ['id' => $employee->id]) }}" class="td_a">
					@else 
						<a href="{{ route('employees.show', ['id' => $employee->id]) }}">
					@endif
					{{ $employee->id }}
					</a>
					</td>
					<td>{{ $employee->first_name }}</td>
					<td>{{ $employee->last_name }}</td>
					<td>{{ $employee->department }}</td>
					<td>{{ $employee->section }}</td>
					<td>{{ $employee->work_phone_no }}</td>
				</tr>
			@endforeach
		</table>
	@endif
@stop