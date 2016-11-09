@extends('templates.default')
@section('scripts')
	<script>
	$( function() {
		var type_list = {!! json_encode($type_list) !!};
		$( "#type" ).autocomplete({
			source: type_list
		});
		
		var mark_list = {!! json_encode($mark_list) !!};
		$( "#mark" ).autocomplete({
			source: mark_list
		});
		
		var model_list = {!! json_encode($model_list) !!};
		$( "#model" ).autocomplete({
			source: model_list
		});
		
		var destination_list = {!! json_encode($destination_list) !!};
		$( "#destination" ).autocomplete({
			source: destination_list
		});
		
	});
	</script>
@stop

@section('content')
	@if(!$peripheral)
		<p>Peripheral not found</p>
	@else
		@include('modals/delete_confirmation_with_reason')
		<form method="POST" action="/peripherals/{{ $peripheral->id }}">
		<table class='table table-bordered table-hover'>
			<tr class="success">
				<th>Id</th>
				<th>Type</th>
				<th>Mark</th>
			</tr>	
			<tr>
				<td><input type="text" name="id" readonly="readonly" value="{{ $peripheral->id }}"></td>
				<td><input type="text" name="type" id="type" value="{{ $peripheral->type }}"></td>
				<td><input type="text" name="mark" id="mark" value="{{ $peripheral->mark }}"></td>
			</tr>
			<tr class="success">
				<th>Model</th>
				<th>SN</th>
				<th>Destination</th>
			</tr>
			<tr>
				<td><input type="text" name="model" id="model" value="{{ $peripheral->model }}"></td>
				<td><input type="text" name="sn" value="{{ $peripheral->sn }}"></td>
				<td><input type="text" name="destination" id="destination" value="{{ $peripheral->destination }}"></td>
			</tr>
			<tr class="success">
				<th>Computer id</th>
				<th colspan="2" >History</th>
			</tr>
			<tr>
				<td><input type="text" name="computer_id" value="{{ $peripheral->computer_id }}"></td>
				<td colspan="2"><input type="text" name="history" readonly="readonly" value="{{ $peripheral->history }}"></td>
			</tr>
		</table>
		<table class="table_update">
		<tr>
			<td>
				<button id="delete_peripheral" class="btn btn-danger">Delete</button>
			</td>
			<td>
				<input type="hidden" name="_token" value="{{ csrf_token() }}">    
				<button type="submit" class="btn btn-success pull-right">Update</button>
			</td>
		</tr>
		</table>
		</form>
	@endif
	<script>
		var token = '{{ Session::token() }}';
		var id = '{{ $peripheral->id }}';
		// var url = '{{ route('peripherals.update', ['id' => $peripheral->id]) }}';
		
		$("#delete_peripheral").click(function(e) {
				e.preventDefault();
				$('#confirm').modal({ backdrop: 'static', keyboard: false })
					.on('click', '#delete-btn', function(){
						var reason = $('#reason').val();
						$.ajax({
							url: '/partials/structure',
							method: "GET", 
							data: {id:id, reason: reason, delete_peripheral:'delete_peripheral'},
						});
						
						$('#confirm').modal('hide');
						
						window.location.href = "http://assetmanager.dev";
						
				});
				$('#alert').addClass("alert alert-success").html('Succesfully deleted');
				
		});
		
	</script>
@stop