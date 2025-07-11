<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class DebugController extends BaseController
{
    public function testRoute()
    {
        log_message('debug', 'DebugController::testRoute received a request.');
        return $this->response->setStatusCode(200)->setBody('Debug OK');
    }
} 