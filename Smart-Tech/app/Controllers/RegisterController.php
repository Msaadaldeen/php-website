<?php

namespace App\Controllers;

use App\View;
use App\BaseController;
use App\Helpers\Session;
use App\Request;
use App\Models\FormValidation;
use App\Models\Database;
use App\Models\User;

class RegisterController extends BaseController
{
    public function index(Request $request)
    {
        $db = new Database;

        if ($request->getmethod() === 'POST') {
            $formInput = $request->getInput();
            $validation = new FormValidation($formInput, $this->db);

            $validation->setRules([
                'firstName' => 'required|min:2|max:32',
                'lastName' => 'required|min:2|max:32',
                'email' => 'required|email|available:users',
                'gender' => 'required',
                'city' => 'required|min:2|max:32',
                'country' => 'required|in:holland, germeny, austria, france, italy, spain, switzerland',
                'username' => 'required|min:2|max:32|available:users',
                'password' => 'required|min:6',
                'passwordConfirmation' => 'required|matches:password',
                'termOfService' => 'required'
            ]);

            $validation->validate();

            if ($validation->fails()) {
                $this->view->render('register', [
                    'errors' => $validation->getErrors()
                ]);
                return;
            }



            $this->user->register($formInput);
            Session::flash('message', 'You are registered successfully and can now login.');
            $this->redirectTo('/login');
        }

        $this->view->render('register');
    }
}
