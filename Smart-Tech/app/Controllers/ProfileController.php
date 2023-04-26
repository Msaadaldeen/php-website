<?php

namespace App\Controllers;

use App\BaseController;
use App\View;
use App\Request;



class ProfileController extends BaseController
{
    public function index(Request $request)
    {
        if (!$this->user->isLoggedIn()) {
            $this->redirectTo('/login');
        }

        $this->view->render('profile', [
            'user' => $this->user
        ]);
    }
}
