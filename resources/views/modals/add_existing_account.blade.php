<div class="modal fade" id="add_existing_account">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title">Add existing account</h4>
      </div>
      <div class="modal-body">
	  <select id="selected_account" name="selected_account">
	  @foreach($accounts as $account)
		<option>{{ $account }}</option>
	  @endforeach
	  </select>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="add_selected_account">Add</button>
		<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->