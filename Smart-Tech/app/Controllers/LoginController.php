<?php

namespace App\Controllers;

use App\View;
use App\BaseController;
use App\Request;
use App\Models\Database;
use App\Models\FormValidation;
use App\Models\User;
use Exception;

class LoginController extends BaseController
{
    public function index(Request $request)
    {


        if ($this->user->isLoggedIn()) {
            $this->redirectTo('/dashboard');
        }

        if ($request->getMethod() !== 'POST') {
            $this->view->render('login');
            return;
        }

        $formInput = $request->getInput();

        $Validation = new FormValidation($formInput, $this->db);

        $Validation->setRules([
            'username' => 'required|min:2|max:32',
            'password' => 'required|min:6'
        ]);

        $Validation->validate();

        if ($Validation->fails()) {
            $this->view->render('login', [
                'errors' => $Validation->getErrors()
            ]);
            return;
        }



        try {
            $this->user->login($formInput);
            $this->redirectTo('/dashboard');
        } catch (Exception $e) {
            $this->view->render('login', [
                'errors' => [
                    'root' => $e->getMessage()
                ]
            ]);
        }
    }
}
