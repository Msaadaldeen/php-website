<?php

namespace App\Controllers;

use App\BaseController;
use App\Request;
use App\View;
use App\Models\Database;
use App\Models\FormValidation;
use App\Helpers\Session;

class ContactController extends BaseController
{
    public function index(Request $request)
    {
        if ($request->getMethod() !== 'POST') {
            $this->view->render('contact');
            return;
        }


        $formInput = $request->getInput();
        $validation = new FormValidation($formInput, $this->db);

        $validation->setRules([
            'name' => 'required|min:2|max:32',
            'email' => 'required|email',
            'phone' => 'required',
            'subject' => 'required|min:2|max:32',
            'letter' => 'required|min:2'
        ]);

        $validation->validate();

        if ($validation->fails()) {
            $this->view->render('contact', [
                'errors' => $validation->getErrors()
            ]);
            return;
        }

        Session::flash('message', 'Your message has been successfully sent.');
        $this->redirectTo('/contact');
    }
}
