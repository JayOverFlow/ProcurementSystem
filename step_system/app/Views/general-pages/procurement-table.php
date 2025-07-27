<div class="row align-items-center justify-content-between">
	<div class="col-xl-12 col-lg-12 col-sm-12 layout-spacing">
		<div class="widget-content widget-content-area br-8 d-flex flex-column justify-content-center" style="min-height: 120px;">
			<div class="table-responsive">
				<div id="ecommerce-list_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
					<div class="row pt-4 pb-0 align-items-center justify-content-center">
						<div class="col-auto d-flex align-items-center ms-3" style="gap: 0.5rem;">
							<label for="filter-form-type" class="form-label mb-0 me-1" style="font-weight: 500;">Filter:</label>
							<select class="form-select form-select-sm" id="filter-form-type" style="width: 110px; min-width: 80px; font-size: 0.95rem;">
								<option value="PR">PR</option>
								<option value="PPMP">PPMP</option>
								<option value="" selected>All</option>
							</select>
						</div>
						<div class="col d-flex justify-content-end align-items-center">
							<div class="input-group w-auto me-2" style="min-width:200px;">
								<input id="custom-search" type="text" class="form-control" placeholder="Search...">
							</div>
							<button class="btn btn-danger me-2" data-bs-toggle="modal" data-bs-target="#createFormModal">CREATE</button>
							<button id="delete-button" class="btn btn-dark d-flex align-items-center justify-content-center p-0" style="height:38px; width:38px; min-width:0;" disabled>
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2">
									<polyline points="3 6 5 6 21 6"></polyline>
									<path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
									<line x1="10" y1="11" x2="10" y2="17"></line>
									<line x1="14" y1="11" x2="14" y2="17"></line>
								</svg>
							</button>
						</div>
					</div>
						<table id="procurement-table" class="table table-hover text-nowrap">
							<thead>
								<tr>
									<th style="min-width: 40px; width: 40px;"><input class="form-check-input" type="checkbox" id="select-all"></th>
									<th>Form</th>
									<th>Document-Id</th>
									<th>Sent To</th>
									<th>Created</th>
								</tr>
							</thead>
							<tbody>
								<?php if (!empty($forms)): ?>
									<?php foreach ($forms as $form): ?>
										<?php /* Make the entire row clickable to view/edit the form, and include task_id for deletion */ ?>
										<tr data-href="<?= base_url($form['url_slug'] . '/create/' . esc($form['document_id'])) ?>" data-task-id="<?= esc($form['task_id']) ?>" style="cursor: pointer;">
											<td><input class="form-check-input" type="checkbox" onclick="event.stopPropagation();" value="<?= esc($form['task_id']) ?>"></td>
											<td data-search="<?= esc($form['form_type']) ?>"><?= esc($form['type']) ?></td>
											<td><?= esc($form['document_id']) ?></td>
											<td><?= esc($form['sent_to']) ?></td>
											<td><?= esc($form['created_at']) ?></td>
										</tr>
									<?php endforeach; ?>
								<?php else: ?>
									<tr>
										<td colspan="5" class="text-center">You haven't created any forms yet.</td>
									</tr>
								<?php endif; ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
