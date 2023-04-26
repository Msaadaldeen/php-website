<?php

namespace App\Controllers;


use App\BaseController;
use App\View;
use App\Request;
use App\Models\FormValidation;
use App\Models\Post;
use App\Models\User;
use App\Helpers\Session;
use App\Models\FileValidation;
use Exception;
use App\Models\Comment;

class PostController extends BaseController
{
    public function index(Request $request)
    {
        if (!isset($request->getInput('page')[0])) {
            Session::flash('message', 'This post could not be found.');
            $this->redirectTo('/');
        }

        $identifier = $request->getInput('page')[0];

        $post = new Post($this->db);

        if (!$post->find($identifier)) {
            Session::flash('message', 'This post could not be found.');
            $this->redirectTo('/');
        }

        if (!$this->user->isLoggedIn()) {
            $this->redirectTo('/login');
        }

        if ($request->getMethod() === 'POST') {
            $this->comment($request, $post);
        }

        $this->view->render('posts/index', [
            'post' => $post
        ]);
    }

    public function edit(Request $request)
    {

        if (!isset($request->getInput('page')[0])) {
            Session::flash('message', 'This page must been accessed via link.');
            $this->redirectTo('/');
        }

        $post = new Post($this->db);
        $identifier = $request->getInput('page')[0];
        if (!$post->find($identifier)) {
            Session::flash('message', 'This post could not be found.');
            $this->redirectTo('/');
        }


        if (!$this->user->isLoggedIn() || $this->user->getId() !== $post->getUserId() || $this->user->getRoles() !== 'admin') {
            if ($this->user->getRoles() !== 'admin') {
                Session::flash('message', 'You do not have permission to edit this post.');
                $this->redirectTo('/');
            }
        }

        if ($request->getMethod() !== 'POST') {
            $this->view->render('posts/edit', [
                'post' => $post
            ]);
            return;
        }

        $formInput = $request->getInput();

        $validation = new FormValidation($formInput, $this->db);

        $validation->setRules([
            'title' => 'required|min:5|max:128',
            'body' => 'required|min:64',
        ]);

        $validation->validate();

        if ($validation->fails()) {
            $this->view->render('posts/edit', [
                'errors' => $validation->getErrors()
            ]);
        }

        if (!$post->edit($formInput)) {
            Session::flash('message', 'Post could not be edited.');
            $this->view->render('posts/edit', [
                'post' => $post
            ]);
        }
        Session::flash('message', 'Post edited successfully');
        $this->redirectTo("/post/{$post->getId()}/{$post->getSlug()}");
    }

    public function delete(Request $request)
    {
        $getInput = $request->getInput('get');
        if (!isset($getInput['csrfToken']) || $getInput['csrfToken'] !== Session::get('csrfToken')) {
            Session::flash('message', 'You are not authorized to delete this post.');
            $this->redirectTo('/dashboard');
        }


        if (!isset($request->getInput('page')[0])) {
            Session::flash('message', 'This page must been accessed via link.');
            $this->redirectTo('/');
        }

        $post = new Post($this->db);
        $identifier = $request->getInput('page')[0];
        if (!$post->find($identifier)) {
            Session::flash('message', 'This post could not be found or has already been deleted.');
            $this->redirectTo('/');
        }

        if (!$this->user->isLoggedIn() || $this->user->getId() !== $post->getUserId()) {
            if ($this->user->getRoles() !== 'admin') {
                Session::flash('message', 'You do not have permission to delete this post.');
                $this->redirectTo('/');
            }
        }

        if (!$post->delete()) {
            Session::flash('message', 'This post could not be deleted.');
            $this->redirectTo('/');
        }

        Session::flash('message', 'Post deleted successfully.');
        $this->redirectTo('/dashboard');
    }

    public function like(Request $request)
    {
        $getInput = $request->getInput('get');
        if (!isset($getInput['csrfToken']) || $getInput['csrfToken'] !== Session::get('csrfToken')) {
            Session::flash('message', 'You are not authorized to delete this post.');
            $this->redirectTo('/dashboard');
        }

        if (!isset($request->getInput('page')[0])) {
            Session::flash('message', 'This page must been accessed via link.');
            $this->redirectTo('/');
        }

        $post = new Post($this->db);
        $identifier = $request->getInput('page')[0];

        if (!$post->find($identifier)) {
            Session::flash('message', 'This post could not be found.');
            $this->redirectTo('/');
        }

        if (!$this->user->isLoggedIn()) {
            Session::flash('message', 'You must be signed in to like this post.');
            $this->redirectTo('/');
        }

        $post->like($this->user->getId());
        $this->redirectTo("/post/{$post->getId()}/{$post->getSlug()}");
    }

    public function dislike(Request $request)
    {
        $getInput = $request->getInput('get');
        if (!isset($getInput['csrfToken']) || $getInput['csrfToken'] !== Session::get('csrfToken')) {
            Session::flash('message', 'You are not authorized to delete this post.');
            $this->redirectTo('/dashboard');
        }

        if (!isset($request->getInput('page')[0])) {
            Session::flash('message', 'This page must been accessed via link.');
            $this->redirectTo('/');
        }

        $post = new Post($this->db);
        $identifier = $request->getInput('page')[0];

        if (!$post->find($identifier)) {
            Session::flash('message', 'This post could not be found.');
            $this->redirectTo('/');
        }

        if (!$this->user->isLoggedIn()) {
            Session::flash('message', 'You must be signed in to unlike this post.');
            $this->redirectTo('/');
        }

        $post->dislike($this->user->getId());
        $this->redirectTo("/post/{$post->getId()}/{$post->getSlug()}");
    }

    public function comment(Request $request, Post $post)
    {


        $formInput = $request->getInput();


        $formValidation = new FormValidation($formInput, $this->db);
        $formValidation->setRules([
            'comment' => 'required|min:5',
        ]);

        $formValidation->validate();
        if ($formValidation->fails()) {
            $this->view->render('/posts/index', [
                'errors' => $formValidation->getErrors(),
                'post' => $post,
            ]);
            return;
        }

        $comment = new Comment($this->db);

        $comment->createComment($this->user->getId(), $post->getId(), $formInput);
    }
}
