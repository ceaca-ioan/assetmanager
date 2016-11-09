@extends('templates.default')

@section('content')
	@if(!$personalphones->count())
		<caption>Personal phones: no results</caption>
	@else
		<caption>Personal phones: {{ $personalphones->count() }} {{ $personalphones->count() === 1 ? "result" : "results" }}</caption>
		<table class='table table-bordered table-hover'>
			<tr class="success">
				<th>Personal phone ID</th>
				<th>Employee ID</th>
				<th>Mark</th>
				<th>Model</th>
				<th>Notes</th>
			</tr>
			@foreach($personalphones as $personalphone)
				<tr>
					<td>
					@if (Auth::user()->canCUD())
						<a href="{{ route('personalphones.edit', ['id' => $personalphone->id]) }}" class="td_a">
					@else 
						<a href="{{ route('personalphones.show', ['id' => $personalphone->id]) }}">
					@endif
					{{ $personalphone->id }}
					</a>
					</td>
					<td><div>
					<a href="{{ route('employees.edit', ['id' => $personalphone->employee_id]) }}" class="td_a">{{ $personalphone->employee_id }}</a>
					</div></td>
					<td>{{ $personalphone->mark }}</td>
					<td>{{ $personalphone->model }}</td>
					<td>{{ $personalphone->notes }}</td>
				</tr>
			@endforeach
		</table>
	@endif
@stop