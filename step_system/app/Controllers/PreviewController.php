<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class PreviewController extends BaseController
{
    public function postPreviewPO()
    {
        return view('preview-pages/po-preview');
    }
    public function postPreviewPR()
    {
        return view('preview-pages/pr-preview');
    }
}
