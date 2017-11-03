<?php

  class HomeController extends Controller{

    public function index(){
      return $this->view('index');
    }

    public function getUsers(){
      $users = $this->model('User')->index();
      return $this->view('users', ['users' => $users]);
    }
  }
