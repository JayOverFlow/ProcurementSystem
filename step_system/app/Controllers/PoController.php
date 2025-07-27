<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PoModel;
use App\Models\PoItemModel;

class PoController extends BaseController
{
    protected $poModel;
    protected $poItemModel;

    public function __construct()
    {
        $this->poModel = new PoModel();
        $this->poItemModel = new PoItemModel();
    }

    public function save()
    {
        $rules = [
            'po_supplier' => 'required',
            'po_address' => 'required',
            'po_tele' => 'required|numeric',
            'po_tin' => 'required',
            'po_ponumber' => 'required',
            'po_date' => 'required',
            'po_mode' => 'required',
            'po_tuptin' => 'required',
            'po_place_delivery' => 'required',
            'po_date_delivery' => 'required',
            'po_delivery_term' => 'required',
            'po_payment_term' => 'required',
            'po_description' => 'required',
            'po_amount_in_words' => 'required',
            'po_total_amount' => 'required|numeric',
            'conforme_name_of_supplier' => 'required',
            'conforme_date' => 'required',
            'conforme_campus_director' => 'required',
            'po_fund_cluster' => 'required',
            'po_fund_available' => 'required',
            'po_accountant' => 'required',
            'po_orsburs' => 'required',
            'po_date_orsburs' => 'required',
            'po_amount' => 'required|numeric',
        ];

        $messages = [
            'po_supplier' => ['required' => 'Supplier is required.'],
            'po_address' => ['required' => 'Address is required.'],
            'po_tele' => ['required' => 'Telephone number is required.', 'numeric' => 'Telephone number must be numeric.'],
            'po_tin' => ['required' => 'TIN is required.'],
            'po_ponumber' => ['required' => 'P.O. Number is required.'],
            'po_date' => ['required' => 'Date is required.'],
            'po_mode' => ['required' => 'Mode of Procurement is required.'],
            'po_tuptin' => ['required' => 'TUP-Taguig TIN is required.'],
            'po_place_delivery' => ['required' => 'Place of Delivery is required.'],
            'po_date_delivery' => ['required' => 'Date of Delivery is required.'],
            'po_delivery_term' => ['required' => 'Delivery Term is required.'],
            'po_payment_term' => ['required' => 'Payment Term is required.'],
            'po_description' => ['required' => 'Description is required.'],
            'po_amount_in_words' => ['required' => 'Amount in Words is required.'],
            'po_total_amount' => ['required' => 'Total Amount is required.', 'numeric' => 'Total Amount must be numeric.'],
            'conforme_name_of_supplier' => ['required' => 'Name of Supplier is required.'],
            'conforme_date' => ['required' => 'Date is required.'],
            'conforme_campus_director' => ['required' => 'Campus Director is required.'],
            'po_fund_cluster' => ['required' => 'Funds Cluster is required.'],
            'po_fund_available' => ['required' => 'Funds Available is required.'],
            'po_accountant' => ['required' => 'Accountant is required.'],
            'po_orsburs' => ['required' => 'ORS / BURS NO. is required.'],
            'po_date_orsburs' => ['required' => 'Date of the ORS / BURS is required.'],
            'po_amount' => ['required' => 'Amount is required.', 'numeric' => 'Amount must be numeric.'],
        ];

        if (!$this->validate($rules, $messages)) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Handle successful validation (e.g., save to database)
        // For now, just a success message
        return redirect()->back()->with('success', 'Purchase Order saved successfully.');
    }
}
