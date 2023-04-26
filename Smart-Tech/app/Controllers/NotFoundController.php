<?php

namespace App\Controllers;

use App\Request;
use App\BaseController;


class NotFoundController extends BaseController
{
    public function index(Request $request)
    {
        $this->view->render('notfound');
    }
}
