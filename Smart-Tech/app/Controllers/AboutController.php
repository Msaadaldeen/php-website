<?php

namespace App\Controllers;

use App\BaseController;
use App\Request;
use App\View;


class AboutController extends BaseController
{
    public function index(Request $request)
    {
        if ($request->getMethod() !== 'POST') {
            $this->view->render('about');
            return;
        }
    }
}
