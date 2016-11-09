<div class="modal fade" id="add_unallocated_peripheral">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title">Add unallocated peripheral</h4>
      </div>
      <div class="modal-body">
	  @if($peripherals)
		<select id="selected_peripheral">
		@foreach ($peripherals as $peripheral)
			<option>{{ $peripheral->id }}</option>
		@endforeach
		</select>
	  @endif

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="add_selected_peripheral">Add</button>
		<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->