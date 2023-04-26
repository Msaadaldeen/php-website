<?php

namespace App\Controllers;

use App\BaseController;
use App\View;
use App\Request;
use App\Models\Database;
use App\Models\User;
use App\Models\Post;



class BlogController extends BaseController
{
    public function index(Request $request)
    {
        $this->view->render('blog', [
            'user' => $this->user
        ]);
    }
}
