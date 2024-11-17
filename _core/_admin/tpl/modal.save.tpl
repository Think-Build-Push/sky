<div id="save_~~crud~~_box" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal" role="document" style="display: block;">
		<div class="modal-content rounded">
			<div class="modal-header">
				<h5 class="modal-title">~~crud~~ Save Form</h5>
			</div>
			<div class="modal-body">
				<form id="save_~~crud~~_form" method="POST" action="/~~crud~~/save" class="form validate">
					<div id="save_~~crud~~_form_fields">
					</div>
				</form>
			</div>
			<div class="modal-footer d-flex justify-content-between">
				<a href="javascript:void(0)" data-bs-dismiss="modal" onClick="new _form({ form_id: '#save_~~crud~~_form' }).resetForm();" class="btn btn-default">Cancel</a>
				<a href="javascript:void(0)" onClick="new _form({ form_id: 'save_~~crud~~_form', autoform: true }).autoform();" class="btn btn-default">Reload Form</a>
				<a href="javascript:void(0)"
					onClick="new _form({ form_id: 'save_~~crud~~_form' })
							.send()
							.then(
								function( _ret )
								{
									new _form({ form_id: '#save_~~crud~~_form' }).resetForm();
									new _loader({}).load( '.~~crud~~_list' );
									$( '#save_~~crud~~_box' ).modal( 'toggle' );
								}
							);" class="btn btn-primary">Save</a>
			</div>
		</div>
	</div>
</div>