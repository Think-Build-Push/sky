~~include:_master_head~~

	<div class="d-flex">
		<!-- Page Content -->
		<div class="col-12">
			<div class="row">
				<h3>~~crud~~ List</h3>
			</div>
			<div class="row">
				<div class="col-12 mt-3" id="canvas">
					<div class="col-12">
						<div class="col-12 text-end">
							<a href="javascript:void(0)" data-bs-backdrop="false" data-bs-toggle="modal" data-bs-target="#table_prefs_box" onClick="new _table({ table: '~~crud~~_list' }).initTable().then( () => { new _table({ table: '~~crud~~_list' }).openPrefs(); } );" class="btn btn-default"><i class="fa fa-gear text-primary"></i></a>
							<a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#table_filters_box" onClick="new _table({ table: '~~crud~~_list' }).openFilters();" class="btn btn-default"><i class="fa fa-filter text-primary"></i></a>
							<a href="javascript:void(0)" onClick="new _loader({}).load( '#~~crud~~_list' );" class="btn btn-default"><i class="fa fa-redo-alt text-primary"></i></a>
							<a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#save_~~crud~~_box" onClick="new _form({ form_id: 'save_~~crud~~_form', autoform: true }).autoform();" class="btn btn-primary"><i class="fa fa-plus me-3"></i>Add New</a>
						</div>
						<table id="~~crud~~_table" class="form">
							<thead>
								<tr>
									~~crud_header~~
								</tr>
							</thead>
							<tbody
								id="~~crud~~_list" class="autoload ~~crud~~_list"
								flare-src="/~~crud~~/list"
								flare-tpl="~~crud~~_list_tpl"
								flare-when-empty="<div class='list-group-item'>No ~~crud~~ to display</div>"
							>
							</tbody>
						<table>
						<template id="~~crud~~_list_tpl" class="d-none">
							<tr id="~~crud~~_~~~~crud~~_id~~" class=""
								~~filter_cols~~
							>
								~~crud_cols~~
								<td>
									<div class="btn-group">
										<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#save_~~crud~~_box"
											onClick="
												_dom.val('#save_~~crud~~_box_~~crud~~_id', '~~crud~~_id');
												new _form({ form_id: 'save_~~crud~~_form', autoform: true }).autoform()
												.then(
													() =>
													{
														new _api({ url: '/~~crud~~/fetch/~~~~crud~~_id~~' })
														.poll()
														.then(
															function( _ret )
															{
																if( 1 == _ret.return )
																{
																	new _form({ form_id: 'save_~~crud~~_form', data: _ret.data }).popForm();
																}
															}
														);
													}
												);
											">Edit
										</button>
										<button type="button" class="btn btn-secondary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
											<span class="visually-hidden">Toggle Dropdown</span>
										</button>
										<ul class="dropdown-menu">
											<li><a href="javascript:void(0);" class="dropdown-item"
												onClick="
													if( confirm( 'Are you sure you want to delete?' ) )
													{
														new _api({ url: '/~~crud~~/delete/~~~~crud~~_id~~' })
															.poll()
															.then(
																() =>
																{
																	new _loader({}).load( '.~~crud~~_list' );
																}
															);
													}">Delete
											</a></li>
										</ul>
									</div>
								</td>
							</tr>
						</template>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>

<div id="save_~~crud~~_modal_tpl" class="autotpl" data-tpl="modal/~~crud~~_save"></div>

~~include:_master_foot~~
