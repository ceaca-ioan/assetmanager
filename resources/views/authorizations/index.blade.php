@extends('templates.default')

@section('content')
	@if(!$authorizations->count())
		<caption>Authorizations: no results</caption>
	@else
		<caption>Authorizations: {{ $authorizations->count() }} {{ $authorizations->count() === 1 ? "result" : "results" }}</caption>
		<table class='table table-bordered table-hover'>
			<tr class="success">
				<th>Serial Number</th>
				<th>Employee id</th>
				<th>Authorization level</th>
				<th>Expiry date</th>
			</tr>
			@foreach($authorizations as $authorization)
				<tr>
					<td>
					@if (Auth::user()->canCUD())
						<a href="{{ route('authorizations.show', ['id' => $authorization->id]) }}" class="td_a"> 
					@else 
						<a href="{{ route('authorizations.show', ['id' => $authorization->id]) }}" class="td_a">
					@endif
					{{ $authorization->sn }}
					</a>
					</td>
					<td><a href="{{ route('employees.show', ['id' => $authorization->employee_id]) }}" class="td_a">{{ $authorization->employee_id }}</a></td>
					<td>{{ $authorization->authorization_level }}</td>
					<td>{{ $authorization->expiry_date }}</td>
				</tr>
			@endforeach
		</table>
	@endif
@stop		