<?php

namespace App\Controllers;

use App\BaseController;
use App\Request;
use App\View;
use App\Models\Database;
use App\Models\User;
use App\Models\Post;

class HomeController extends BaseController
{
    public function index(Request $request)
    {

        $this->view->render('home', [
            'user' => $this->user
        ]);
    }
}
