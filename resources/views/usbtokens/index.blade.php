@extends('templates.default')

@section('content')
	@if(!$usbtokens->count())
		<caption>USB tokens: no results</caption>
	@else
		<caption>USB tokens: {{ $usbtokens->count() }} {{ $usbtokens->count() === 1 ? "result" : "results" }}</caption>
		<table class='table table-bordered table-hover'>
			<tr class="success">
				<th>USB token ID</th>
				<th>Mark/Model</th>
				<th>Classification level</th>
				<th>Employee id</th>
			</tr>
			@foreach($usbtokens as $usbtoken)
				<tr>
					<td>
					@if (Auth::user()->canCUD())
						<a href="{{ route('usbtokens.edit', ['id' => $usbtoken->id]) }}" class="td_a"> 
					@else 
						<a href="{{ route('usbtokens.show', ['id' => $usbtoken->id]) }}" class="td_a">
					@endif
					{{ $usbtoken->id }}
					</a>
					</td>
					<td>{{ $usbtoken->mark_model }}</td>
					<td>{{ $usbtoken->classification_level }}</td>
					<td><a href="{{ route('employees.show', ['id' => $usbtoken->employee_id]) }}" class="td_a">{{ $usbtoken->employee_id }}</a></td>
				</tr>
			@endforeach
		</table>
	@endif
@stop		