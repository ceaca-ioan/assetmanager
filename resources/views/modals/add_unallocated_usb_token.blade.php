<div class="modal fade" id="add_unallocated_usb_token">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title">Add unallocated USB token</h4>
      </div>
      <div class="modal-body">
	  @if($usb_tokens)
		<select id="selected_usb_token">
		@foreach ($usb_tokens as $usb_token)
			<option>{{ $usb_token->id }}</option>
		@endforeach
		</select>
	  @endif

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="add_selected_usb_token">Add</button>
		<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->