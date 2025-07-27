<form id="po-form" action="<?= base_url('/po/save') ?>" method="post">
    <!-- Hidden field for PO ID when editing existing PO -->
    <input type="hidden" name="po_id" value="<?= isset($po) ? $po['po_id'] : '' ?>">
    <div class="row invoice layout-top-spacing layout-spacing">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="doc-container">
                <div class="row">
                    <div class="col-xl-9">
                        <div class="invoice-content">
                            <div class="invoice-detail-body">
                                <div class="invoice-detail-title d-flex flex-column text-start mb-0">
                                    <div>
                                        <h2 class="fw-bold" style="color: #C62742">Purchase Order</h2>
                                    </div>
                                    <div class="d-flex justify-content-start gap-3">
                                        <p class="col-auto text-start mb-0">FM-PR-007</p>
                                        <p class="col-auto text-start mb-0">REV 0</p>
                                        <p class="col-auto text-start mb-0">09NOV2016</p>
                                    </div>
                                </div>
                                <hr class="my-3">

                                <div class="invoice-detail-header">
                                    <div class="row justify-content-between">
                                        <div class="col-xl-5 invoice-address-company">
                                            <div class="invoice-address-company-fields">
                                                <div class="form-group row mt-4">
                                                    <label for="po-supplier" class="col-sm-3 col-form-label col-form-label-sm">Supplier</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control form-control-sm" id="po-supplier" name="po_supplier" value="<?= old('po_supplier', $po['po_supplier'] ?? '') ?>">
                                                        <?php if (session('errors.po_supplier')) : ?>
                                                            <div class="invalid-feedback d-block"><?= session('errors.po_supplier') ?></div>
                                                        <?php endif ?>

                                                    </div>
                                                </div>
                                                <div class="form-group row mt-4">
                                                    <label for="po-address" class="col-sm-3 col-form-label col-form-label-sm">Address</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control form-control-sm" id="po-address" name="po_address" value="<?= old('po_address', $po['po_address'] ?? '') ?>">
                                                        <?php if (session('errors.po_address')) : ?>
                                                            <div class="invalid-feedback d-block"><?= session('errors.po_address') ?></div>
                                                        <?php endif ?>

                                                    </div>
                                                </div>  

                                                <div class="form-group row mt-4">
                                                    <label for="po-tele" class="col-sm-3 col-form-label col-form-label-sm">Tel No.</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control form-control-sm" id="po-tele" name="po_tele" value="<?= old('po_tele', $po['po_tele'] ?? '') ?>">
                                                        <?php if (session('errors.po_tele')) : ?>
                                                            <div class="invalid-feedback d-block"><?= session('errors.po_tele') ?></div>
                                                        <?php endif ?>

                                                    </div>
                                                </div>  

                                                <div class="form-group row mt-4">
                                                    <label for="po-tin" class="col-sm-3 col-form-label col-form-label-sm">TIN</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control form-control-sm" id="po-tin" name="po_tin" value="<?= old('po_tin', $po['po_tin'] ?? '') ?>">
                                                        <?php if (session('errors.po_tin')) : ?>
                                                            <div class="invalid-feedback d-block"><?= session('errors.po_tin') ?></div>
                                                        <?php endif ?>

                                                    </div>
                                                </div>  
                                                
                                            </div>
                                        </div>


                                        <div class="col-xl-5 invoice-address-client">
                                            <div class="invoice-address-company-fields">
                                                <div class="form-group row mt-4">
                                                    <label for="po-ponumber" class="col-sm-3 col-form-label col-form-label-sm">P.O. No.</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control form-control-sm" id="po-ponumber" name="po_ponumber" value="<?= old('po_ponumber', $po['po_ponumber'] ?? '') ?>">
                                                        <?php if (session('errors.po_ponumber')) : ?>
                                                            <div class="invalid-feedback d-block"><?= session('errors.po_ponumber') ?></div>
                                                        <?php endif ?>

                                                    </div>
                                                </div>
                                                <div class="form-group row mt-4">
                                                    <label for="po-date" class="col-sm-3 col-form-label col-form-label-sm">Date</label>
                                                    <div class="col-sm-9">
                                                        <input type="date" class="form-control form-control-sm" id="po-date" name="po_date" value="<?= old('po_date', $po['po_date'] ?? '') ?>">
                                                        <?php if (session('errors.po_date')) : ?>
                                                            <div class="invalid-feedback d-block"><?= session('errors.po_date') ?></div>
                                                        <?php endif ?>

                                                    </div>
                                                </div>  
                                                <div class="form-group row mt-4">
                                                    <label for="po-mode" class="col-sm-3 col-form-label col-form-label-sm">Mode of Procurement</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control form-control-sm" id="po-mode" name="po_mode" value="<?= old('po_mode', $po['po_mode'] ?? '') ?>">
                                                        <?php if (session('errors.po_mode')) : ?>
                                                            <div class="invalid-feedback d-block"><?= session('errors.po_mode') ?></div>
                                                        <?php endif ?>

                                                    </div>
                                                </div>  
                                                <div class="form-group row mt-4">
                                                    <label for="po-tuptin" class="col-sm-3 col-form-label col-form-label-sm">TUP-Taguig TIN</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control form-control-sm" id="po-tuptin" name="po_tuptin" value="<?= old('po_tuptin', $po['po_tuptin'] ?? '') ?>">
                                                        <?php if (session('errors.po_tuptin')) : ?>
                                                            <div class="invalid-feedback d-block"><?= session('errors.po_tuptin') ?></div>
                                                        <?php endif ?>

                                                    </div>
                                                </div>  
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <hr class="my-3">

                                <div class="invoice-detail-header">
                                    <p>Gentlemen: Please furnish this Office the following articles subject to the term and condition contained herein.</p>   
                                </div>

                                <hr class="my-15">

                                <div class="invoice-detail-header">
                                    <div class="row justify-content-between">
                                        <div class="col-xl-5 invoice-address-company">
                                            <div class="invoice-address-company-fields">
                                                <div class="form-group row mt-4">
                                                    <label for="po-place-delivery" class="col-sm-3 col-form-label col-form-label-sm">Place of Delivery</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control form-control-sm" id="po-place-delivery" name="po_place_delivery" value="<?= old('po_place_delivery', $po['po_place_delivery'] ?? '') ?>">
                                                        <?php if (session('errors.po_place_delivery')) : ?>
                                                            <div class="invalid-feedback d-block"><?= session('errors.po_place_delivery') ?></div>
                                                        <?php endif ?>

                                                    </div>
                                                </div>
                                                <div class="form-group row mt-4">
                                                    <label for="po-date-delivery" class="col-sm-3 col-form-label col-form-label-sm">Date of Delivery</label>
                                                    <div class="col-sm-9">
                                                        <input type="date" class="form-control form-control-sm" id="po-date-delivery" name="po_date_delivery" value="<?= old('po_date_delivery', $po['po_date_delivery'] ?? '') ?>">
                                                        <?php if (session('errors.po_date_delivery')) : ?>
                                                            <div class="invalid-feedback d-block"><?= session('errors.po_date_delivery') ?></div>
                                                        <?php endif ?>

                                                    </div>
                                                </div>  
                                            </div>
                                        </div>


                                        <div class="col-xl-5 invoice-address-client">
                                            <div class="invoice-address-company-fields">
                                                <div class="form-group row mt-4">
                                                    <label for="po-delivery-term" class="col-sm-3 col-form-label col-form-label-sm">Delivery Term</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control form-control-sm" id="po-delivery-term" name="po_delivery_term" value="<?= old('po_delivery_term', $po['po_delivery_term'] ?? '') ?>">
                                                        <?php if (session('errors.po_delivery_term')) : ?>
                                                            <div class="invalid-feedback d-block"><?= session('errors.po_delivery_term') ?></div>
                                                        <?php endif ?>

                                                    </div>
                                                </div>  
                                                <div class="form-group row mt-4">
                                                    <label for="po-payment-term" class="col-sm-3 col-form-label col-form-label-sm">Payment Term</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control form-control-sm" id="po-payment-term" name="po_payment_term" value="<?= old('po_payment_term', $po['po_payment_term'] ?? '') ?>">
                                                        <?php if (session('errors.po_payment_term')) : ?>
                                                            <div class="invalid-feedback d-block"><?= session('errors.po_payment_term') ?></div>
                                                        <?php endif ?>

                                                    </div>
                                                </div>  
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                

                                <div class="invoice-detail-items pt-0">

                                    <div class="table-responsive">
                                        <table class="table item-table">
                                            <thead>
                                                <tr>
                                                    <th class="col-1 text-center">Stock</th>
                                                    <th class="col-1 text-center">Unit</th>
                                                    <th class="col-3 text-center">Description</th>
                                                    <th class="col-1 text-center">Qty.</th>
                                                    <th class="col-2 text-center">Unit Cost</th>
                                                    <th class="col-2 text-center">Amount</th>
                                                    <th class="col-1 text-center">Action</th>
                                                </tr>
                                                <tr aria-hidden="true" class="mt-3 d-block table-row-hidden"></tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $items = old('items', $po_items); // Corrected this line
                                                foreach ($items as $index => $item) :
                                                ?>
                                                    <tr>
                                                        <td class="px-1"><input type="text" class="form-control form-control-sm" name="items[<?= $index ?>][po_items_stockno]" value="<?= esc($item['po_items_stockno'] ?? '') ?>"></td>
                                                        <td class="px-1"><input type="text" class="form-control form-control-sm" name="items[<?= $index ?>][po_items_unit]" value="<?= esc($item['po_items_unit'] ?? '') ?>"></td>
                                                        <td class="px-1">
                                                            <div class="description-container">
                                                                <div class="input-group mb-1">
                                                                    <input type="text" class="form-control form-control-sm description-input" name="items[<?= $index ?>][po_items_descrip]" value="<?= esc($item['po_items_descrip'] ?? '') ?>">
                                                                    <button class="description-btn add-description" type="button" tabindex="-1" style="border-radius: 0 .25rem .25rem 0;">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#0d6efd" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus-circle"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="16"></line><line x1="8" y1="12" x2="16" y2="12"></line></svg>
                                                                    </button>
                                                                </div>
                                                                <?php // Changed from !empty($item['specifications']) to check for `po_item_spec_descrip`
                                                                    if (!empty($item['specifications'])) : ?>
                                                                    <?php foreach ($item['specifications'] as $spec) : ?>
                                                                        <div class="input-group mb-1">
                                                                            <input type="text" class="form-control form-control-sm description-input-spec" name="items[<?= $index ?>][specifications][]" placeholder="Item specifications" value="<?= esc($spec['po_item_spec_descrip'] ?? '') ?>">
                                                                            <button class="description-btn remove-description" type="button" tabindex="-1">
                                                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-circle"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>
                                                                            </button>
                                                                        </div>
                                                                    <?php endforeach; ?>
                                                                <?php endif; ?>
                                                            </div>
                                                        </td>
                                                        <td class="px-1"><input type="number" class="form-control form-control-sm" name="items[<?= $index ?>][po_items_quantity]" value="<?= esc($item['po_items_quantity'] ?? '') ?>"></td>
                                                        <td class="px-1"><input type="number" class="form-control form-control-sm" name="items[<?= $index ?>][po_items_cost]" value="<?= esc($item['po_items_cost'] ?? '') ?>"></td>
                                                        <td class="px-1"><input type="number" class="form-control form-control-sm" name="items[<?= $index ?>][po_items_amount]" value="<?= esc($item['po_items_amount'] ?? '') ?>" readonly></td>
                                                        <td class="delete-item-row text-center">
                                                            <ul class="table-controls">
                                                                <li class="p-2"><a href="javascript:void(0);" class="delete-item" data-toggle="tooltip" data-placement="top" title="Delete"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-circle"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg></a></li>
                                                            </ul>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="d-flex justify-content-between">
                                        <button type="button" class="btn btn-md additem" style="background-color: #C62742; color: #FFFFFF">Add Item</button>
                                    </div>
                                    
                                </div>

                                <hr class="my-2">
                                    <div class="invoice-detail-header">
                                        <div class="row">
                                            <div class="col-xl-8 invoice-address-company">
                                                <div class="invoice-address-company-fields">
                                                    <div class="form-group row mt-4">
                                                        <label for="po-description" class="col-sm-3 col-form-label col-form-label-sm">Description</label>
                                                        <div class="col-9">
                                                            <input type="text" class="form-control form-control-sm" id="po-description" name="po_description" value="<?= old('po_description', $po['po_description'] ?? '') ?>">
                                                            <?php if (session('errors.po_description')) : ?>
                                                                <div class="invalid-feedback d-block"><?= session('errors.po_description') ?></div>
                                                            <?php endif ?>

                                                        </div>
                                                    </div>
                                                    <div class="form-group row mt-4">
                                                        <label for="po-amount-in-words" class="col-sm-3 col-form-label col-form-label-sm">Amount in Words</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control form-control-sm" id="po-amount-in-words" name="po_amount_in_words" value="<?= old('po_amount_in_words', $po['po_amount_in_words'] ?? '') ?>">
                                                            <?php if (session('errors.po_amount_in_words')) : ?>
                                                                <div class="invalid-feedback d-block"><?= session('errors.po_amount_in_words') ?></div>
                                                            <?php endif ?>

                                                        </div>
                                                    </div>  
                                                </div>
                                            </div>


                                            <div class="col-xl-4 invoice-address-client">
                                                <div class="invoice-address-company-fields">
                                                    <div class="form-group row mt-4">
                                                        <label for="po-total-amount" class="col-sm-3 col-form-label col-form-label-sm">Total Amount</label>
                                                        <div class="col-sm-9">
                                                            <input type="text" class="form-control form-control-sm" id="po-total-amount" name="po_total_amount" value="<?= old('po_total_amount', $po['po_total_amount'] ?? '') ?>">
                                                            <?php if (session('errors.po_total_amount')) : ?>
                                                                <div class="invalid-feedback d-block"><?= session('errors.po_total_amount') ?></div>
                                                            <?php endif ?>

                                                        </div>
                                                    </div>  
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                <hr class="my-4">
                                <div class="invoice-detail-header">
                                    <p>In case of failure to make the full delivery within the time specified above, a penalty of one tenth (1/10) of the one percent for every day of delay shall be imposed on the undelivered items/s.</p>   
                                </div>

                                <div class="invoice-detail-note border-top-0 mt-0 pt-0">

                                    <div class="row justify-content-between">
                                    
                                        <div class="col-xl-5 invoice-address-client">

                                            <div class="invoice-address-client-fields">

                                                <label for="" class="col-sm-3 col-form-label col-form-label-sm ms-3">Conforme:</label>

                                                <div class="form-group row mt-4">
                                                    <label for="conforme-name-of-supplier" class="col-sm-3 col-form-label col-form-label-sm">Name of Supplier</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control form-control-sm" id="conforme-name-of-supplier" name="conforme_name_of_supplier" value="<?= old('conforme_name_of_supplier', $po['conforme_name_of_supplier'] ?? '') ?>">
                                                        <?php if (session('errors.conforme_name_of_supplier')) : ?>
                                                            <div class="invalid-feedback d-block"><?= session('errors.conforme_name_of_supplier') ?></div>
                                                        <?php endif ?>

                                                    </div>
                                                </div> 

                                                <div class="form-group row">
                                                    <label for="conforme-date" class="col-sm-3 col-form-label col-form-label-sm">Date</label>
                                                    <div class="col-sm-9">
                                                        <input type="date" class="form-control form-control-sm" id="conforme-date" name="conforme_date" value="<?= old('conforme_date', $po['conforme_date'] ?? '') ?>">
                                                        <?php if (session('errors.conforme_date')) : ?>
                                                            <div class="invalid-feedback d-block"><?= session('errors.conforme_date') ?></div>
                                                        <?php endif ?>

                                                    </div>
                                                </div> 
                                                
                                            </div>
                                        </div>

                                        <div class="col-xl-5 invoice-address-client">

                                            <div class="invoice-address-client-fields ms-3">

                                                <div class="form-group row mt-5">
                                                    <label for="conforme-campus-director" class="col-sm-3 col-form-label col-form-label-sm">Campus Director</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control form-control-sm" id="conforme-campus-director" name="conforme_campus_director" value="<?= old('conforme_campus_director', $po['conforme_campus_director'] ?? '') ?>">
                                                        <?php if (session('errors.conforme_campus_director')) : ?>
                                                            <div class="invalid-feedback d-block"><?= session('errors.conforme_campus_director') ?></div>
                                                        <?php endif ?>

                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <hr class="my-4">
                                <div class="invoice-detail-note border-top-0 mt-0 pt-0">
                                    <div class="row justify-content-between">
                                        <div class="col-xl-5 invoice-address-client">
                                            <div class="invoice-address-client-fields">
                                                
                                                <div class="form-group row mt-4">
                                                    <label for="po-fund-cluster" class="col-sm-3 col-form-label col-form-label-sm">Funds Cluster</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control form-control-sm" id="po-fund-cluster" name="po_fund_cluster" value="<?= old('po_fund_cluster', $po['po_fund_cluster'] ?? '') ?>">
                                                        <?php if (session('errors.po_fund_cluster')) : ?>
                                                            <div class="invalid-feedback d-block"><?= session('errors.po_fund_cluster') ?></div>
                                                        <?php endif ?>

                                                    </div>
                                                </div> 

                                                <div class="form-group row mt-2">
                                                    <label for="po-fund-available" class="col-sm-3 col-form-label col-form-label-sm">Funds Available</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control form-control-sm" id="po-fund-available" name="po_fund_available" value="<?= old('po_fund_available', $po['po_fund_available'] ?? '') ?>">
                                                        <?php if (session('errors.po_fund_available')) : ?>
                                                            <div class="invalid-feedback d-block"><?= session('errors.po_fund_available') ?></div>
                                                        <?php endif ?>

                                                    </div>
                                                </div> 

                                                <div class="form-group row mt-2">
                                                    <label for="po-accountant" class="col-sm-3 col-form-label col-form-label-sm">Accountant</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control form-control-sm" id="po-accountant" name="po_accountant" value="<?= old('po_accountant', $po['po_accountant'] ?? '') ?>">
                                                        <?php if (session('errors.po_accountant')) : ?>
                                                            <div class="invalid-feedback d-block"><?= session('errors.po_accountant') ?></div>
                                                        <?php endif ?>

                                                    </div>
                                                </div> 

                                            </div>
                                        </div>

                                        <div class="col-xl-5 invoice-address-client">
                                            <div class="invoice-address-client-fields">
                                                
                                                <div class="form-group row mt-4">
                                                    <label for="po-orsburs" class="col-sm-3 col-form-label col-form-label-sm">ORS / BURS NO.</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control form-control-sm" id="po-orsburs" name="po_orsburs" value="<?= old('po_orsburs', $po['po_orsburs'] ?? '') ?>">
                                                        <?php if (session('errors.po_orsburs')) : ?>
                                                            <div class="invalid-feedback d-block"><?= session('errors.po_orsburs') ?></div>
                                                        <?php endif ?>

                                                    </div>
                                                </div> 

                                                <div class="form-group row mt-2">
                                                    <label for="po-date-orsburs" class="col-sm-3 col-form-label col-form-label-sm">Date of the ORS / BURS</label>
                                                    <div class="col-sm-9">
                                                        <input type="date" class="form-control form-control-sm" id="po-date-orsburs" name="po_date_orsburs" value="<?= old('po_date_orsburs', $po['po_date_orsburs'] ?? '') ?>">
                                                        <?php if (session('errors.po_date_orsburs')) : ?>
                                                            <div class="invalid-feedback d-block"><?= session('errors.po_date_orsburs') ?></div>
                                                        <?php endif ?>

                                                    </div>
                                                </div> 

                                                <div class="form-group row mt-2">
                                                    <label for="po-total-amount" class="col-sm-3 col-form-label col-form-label-sm">Amount</label>
                                                    <div class="col-sm-9">
                                                        <input type="text" class="form-control form-control-sm" id="po-amount" name="po_amount" value="<?= old('po_amount', $po['po_amount'] ?? '') ?>">
                                                        <?php if (session('errors.po_amount')) : ?>
                                                            <div class="invalid-feedback d-block"><?= session('errors.po_amount') ?></div>
                                                        <?php endif ?>

                                                    </div>
                                                </div> 

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            
                        </div>
                        
                    </div>

                    <div class="col-xl-3">

                        <div class="invoice-actions-btn mt-0">

                            <div class="invoice-action-btn">

                                <div class="row">
                                    <div class="col-xl-12 col-md-4">
                                        <button type="submit" class="btn btn-submit w-100 warning save" style="background-color: #C62742; color: #FFFFFF">Save</button>
                                    </div>
                                    <div class="col-xl-12 col-md-4">
                                        <button class="btn btn-submit w-100" style="background-color: #C62742; color: #FFFFFF">Export</button>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        
                    </div>
                </div>
                
                
            </div>

        </div>
    </div>
</form>

<script>
// Pass PO items and specifications data to JavaScript
<?php if (isset($po_items) && !empty($po_items)): ?>
var poItems = <?= json_encode($po_items) ?>;
<?php else: ?>
var poItems = [];
<?php endif; ?>
</script>