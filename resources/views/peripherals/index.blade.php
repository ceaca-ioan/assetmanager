@extends('templates.default')

@section('content')
	@if(!$peripherals->count())
		<caption>Peripherals: no results</caption>
	@else
		<caption>Peripherals: {{ $peripherals->count() }} {{ $peripherals->count() === 1 ? "result" : "results" }}</caption>
		<table class='table table-bordered table-hover'>
			<tr class="success">
				<th>Peripheral ID</th>
				<th>Type</th>
				<th>Mark</th>
				<th>Model</th>
				<th>SN</th>
			</tr>
			@foreach($peripherals as $peripheral)
				<tr>
					<td>
					@if (Auth::user()->canCUD())
						<a href="{{ route('peripherals.edit', ['id' => $peripheral->id]) }}" class="td_a"> 
					@else 
						<a href="{{ route('peripherals.show', ['id' => $peripheral->id]) }}" class="td_a">
					@endif
					{{ $peripheral->id }}
					</a>
					</td>
					<td>{{ $peripheral->type }}</td>
					<td>{{ $peripheral->mark }}</td>
					<td>{{ $peripheral->model }}</td>
					<td>{{ $peripheral->sn }}</td>
				</tr>
			@endforeach
		</table>
	@endif
@stop