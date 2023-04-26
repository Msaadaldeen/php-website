<?php

namespace App\Controllers;

use App\View;
use App\BaseController;
use App\Request;
use App\Models\Database;
use App\Models\User;
use App\Models\FormValidation;
use App\Models\FileValidation;
use App\Models\Post;
use App\Helpers\Session;
use Exception;
use App\Models\Comment;


class DashboardController extends BaseController
{
    public function index(Request $request)
    {


        if (!$this->user->isLoggedIn()) {
            $this->redirectTo('/login');
        }


        if ($request->getmethod() === 'POST') {

            $formInput = $request->getInput();

            $formValidation = new FormValidation($formInput, $this->db);

            $formValidation->setRules([
                'title' => 'required|min:5|max:128',
                'body' => 'required|min:64',
            ]);

            $formValidation->validate();

            $fileInput = $request->getInput('file');



            $fileValidation = new FileValidation($fileInput);

            if (isset($fileInput['image']['size']) && $fileInput['image']['size'] !== 0) {
                $fileValidation->setRules([
                    'image' => 'type:image|maxsize:2097152'
                ]);

                $fileValidation->validate();
            }




            // '/dashboard/posts/''
            if ($formValidation->fails() || $fileValidation->fails()) {
                $this->view->render('/dashboard', [
                    'errors' => array_merge(
                        $formValidation->getErrors(),
                        $fileValidation->getErrors()
                    )
                ]);
            }

            $post = new Post($this->db);
            try {
                $post->create($this->user->getId(), $formInput, $fileInput['image']);
                Session::flash('message', 'Post created successfully');
                $this->redirectTo('/dashboard');
            } catch (Exception $e) {
                $this->view->render('/dashboard', [
                    'errors' => [
                        'root' => $e->getMessage()
                    ]
                ]);
            }
        }

        $this->view->render('dashboard', [
            'user' => $this->user
        ]);
    }
}
