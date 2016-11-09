@extends('templates.default')

@section('content')
	@if(!$networkprinters->count())
		<caption>Network printers: no results</caption>
	@else
		<caption>Network printers: {{ $networkprinters->count() }} {{ $networkprinters->count() === 1 ? "result" : "results" }}</caption>
		<table class='table table-bordered table-hover'>
			<tr class="success">
				<th>Id</th>
				<th>IP</th>
				<th>Name</th>
				<th>CIS</th>
				<th>Organization</th>
				<th>Mark</th>
				<th>Model</th>
			</tr>
			@foreach($networkprinters as $networkprinter)
				<tr>
					<td>
					@if (Auth::user()->canCUD())
						<a href="{{ route('networkprinters.edit', ['id' => $networkprinter->id]) }}" class="td_a"> 
					@else 
						<a href="{{ route('networkprinters.show', ['id' => $networkprinter->id]) }}" class="td_a">
					@endif
					{{ $networkprinter->id }}
					</a>
					</td>
					<td>{{ $networkprinter->ip }}</td>
					<td>{{ $networkprinter->name }}</td>
					<td>{{ $networkprinter->cis_name }}</td>
					<td>{{ $networkprinter->organization }}</td>
					<td>{{ $networkprinter->mark }}</td>
					<td>{{ $networkprinter->model }}</td>
				</tr>
			@endforeach
		</table>
	@endif
@stop