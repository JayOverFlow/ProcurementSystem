<div class="row align-items-center justify-content-between">
	<div class="col-xl-12 col-lg-12 col-sm-12 layout-spacing">
		<div class="widget-content widget-content-area br-8 d-flex flex-column justify-content-center" style="min-height: 120px;">
			<div class="table-responsive">
				<div id="ecommerce-list_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
					<div class="row pt-4 pb-0 mb-4 align-items-center justify-content-center">
						<div class="col-auto d-flex align-items-center ms-3" style="gap: 0.5rem;">
								<label for="filter-document-type" class="form-label mb-0 me-1" style="font-weight: 500;">Filter:</label>
                                <select class="form-select form-select-sm" id="filter-document-type" style="width: 130px; min-width: 80px; font-size: 0.95rem;">
                                    <?php if (isset($filter_options) && is_array($filter_options)):
                                        foreach ($filter_options as $label => $value):
                                            if ($label === 'ALL'): ?>
                                                <option value="" selected>All</option>
                                            <?php else: ?>
                                                <option value="<?= htmlspecialchars($value) ?>"><?= htmlspecialchars($label) ?></option>
                                            <?php endif;
                                        endforeach;
                                     endif; ?>
                                </select>
						</div>
						<div class="col d-flex justify-content-end align-items-center">
							<div class="input-group w-auto me-2" style="min-width:200px;">
								<input id="custom-search" type="text" class="form-control" placeholder="Search...">
							</div>
							<button class="btn btn-danger me-2" data-bs-toggle="modal" data-bs-target="#createFormModal">SUBMIT</button>
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
						<table id="tasks-table" class="table table-hover text-nowrap">
							<thead>
								<tr>
									<th style="min-width: 40px; width: 40px;"><input class="form-check-input" type="checkbox" id="select-all"></th>
									<th class="text-center">Submitted By</th>
									<th>Document Type</th>
									<th>Date Submitted</th>
									<th class="text-center">Status</th>
								</tr>
							</thead>
							<tbody>
								<?php if (!empty($tasks)):
								    foreach ($tasks as $task):
                                        // Prioritize task_status for the Head's view of their own actions
                                        if (isset($task['task_status']) && in_array($task['task_status'], ['Approved', 'Rejected'])) {
                                            $status = $task['task_status'];
                                        } else {
                                            // Fallback to the document's overall status
                                            $status = $task['ppmp_status'] ?? $task['app_status'] ?? $task['pr_status'] ?? $task['po_status'] ?? 'Pending';
                                        }

								        $badge_class = 'badge-warning'; // Default for Pending
								        if ($status === 'Approved') {
								            $badge_class = 'badge-success';
								        } elseif ($status === 'Rejected') {
								            $badge_class = 'badge-danger';
								        } elseif ($status === 'Bidding Completed') {
								            $badge_class = 'badge-success';
								        }
								?>
								        <tr class="task-row" style="cursor: pointer;" data-task-id="<?= esc($task['task_id']) ?>">
											<td><input class="form-check-input" type="checkbox" onclick="event.stopPropagation();" value="<?= esc($task['task_id']) ?>"></td>
								            <td class="text-center"><?= esc($task['submitted_by_name']) ?></td>
								            <td><?= esc($task['task_type']) ?></td>
								            <td><?= esc(date('F j, Y, g:i a', strtotime($task['created_at']))) ?></td>
								            <td class="text-center">
								                <span class="badge <?= $badge_class ?>"><?= esc($status) ?></span>
								            </td>
								        </tr>
								    <?php endforeach; ?>
								<?php endif; ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header justify-content-start border-bottom-0">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>
                </button>
                <h5 class="modal-title ms-3" id="exampleModalCenterTitle">Procurement Task</h5>
            </div>
            <hr class="border border-dark my-1">
            <div class="modal-body d-flex justify-content-start align-items-center">
                <div class="ms-3">
                    <h6 id="modal-fullname"></h6>
                    <p id="modal-role"></p>
                    <p ><span id="modal-email"></span> - <span id="modal-date" class="fw-bold"></span></p>
                </div>
            </div>
            <hr class="border border-dark my-1">
            <div class="modal-body">
                <p id="modal-description"></p>
                <div id="modal-action-buttons" class="widget-content text-center mt-5">
                    <button type="button" id="reject-btn" class="btn btn-sm warning reject" style="background-color: #7B7B7B; color: #FFFFFF">REJECT</button>
                    <button type="button" id="approve-btn" class="btn btn-sm warning approve" style="background-color: #C62742; color: #FFFFFF">Approve and Submit</button>
                </div>
                <div id="modal-status-display" class="text-center mt-5" style="display: none;">
                    <!-- Content will be set by JavaScript -->
                </div>
            </div>
            <hr class="border border-dark my-1">
            <div class="modal-footer d-flex justify-content-start border-top-0">
                <a href="#" id="modal-preview-link" target="_blank" class="ms-3" style="display: none;">
                <img src="<?= base_url('assets/images/red-file-icon.png'); ?>" class="border-0 rounded-0 me-2" alt="file" style="width: 24px; height: 24px;">
                    <span class="text-primary ms-2" id="modal-preview-link-text">View submitted file</span>
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Submit Modal -->
<div class="modal fade" id="createFormModal" tabindex="-1" role="dialog" aria-labelledby="createFormModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createFormModalTitle">Submit Form</h5>
                <a href="javascript:void(0);" data-bs-dismiss="modal">
					<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#8c0404" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-circle">
						<circle cx="12" cy="12" r="10"></circle>
						<line x1="15" y1="9" x2="9" y2="15"></line>
						<line x1="9" y1="9" x2="15" y2="15"></line>
					</svg>
				</a>
            </div>
            <div class="modal-body">
                <table class="table">
                    <thead style="color:#faf0e7;">
                        <tr>
                            <th>Submitted by</th>
                            <th>Section</th>
                            <th>Date Submitted</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Sample User</td>
                            <td>Chemistry</td>
                            <td>2023-06-01</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger">Submit</button>
            </div>
        </div>
    </div>
</div>
