@extends('templates.default')

@section('content')
<!--<pre>
{{ print_r($computers) }}
</pre>-->
	@if(!$computers->count())
		<caption>Computers: no results</caption>
	@else
		<caption>Computers: {{ $computers->count() }} {{ $computers->count() === 1 ? "result" : "results" }}</caption>
		<table class='table table-bordered table-hover'>
			<tr class="success">
				<th>Nr. id.</th>
				<th>IP</th>
				<th>Name</th>
				<th>Inventory no</th>
				<th>Holder</th>
				<th>Provenance</th>
				<th>AI</th>
			</tr>
			@foreach($computers as $computer)
				<tr>
					<td>
					@if (Auth::user()->canCUD())
						<a href="{{ route('computers.edit', ['id' => $computer->id]) }}" class="td_a">
					@else 
						<a href="{{ route('computers.show', ['id' => $computer->id]) }}" class="td_a">
					@endif
					{{ $computer->id }}
					</a>
					</td>
					<td>{{ $computer->ip }}</td>
					<td>{{ $computer->name }}</td>
					<td>{{ $computer->inv_no }}</td>
					<td>{{ $computer->holder }}</td>
					<td>{{ $computer->provenance }}</td>
					<td>
					{{ $computer->ai === 1 ? 'Yes' : 'No' }}
					</td>
				</tr>
			@endforeach
		</table>
	@endif
@stop