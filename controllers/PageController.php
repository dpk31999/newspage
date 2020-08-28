<?php

class PageController extends BaseController
{
  public function index()
  {
    $data = array(
      'name' => 'Sang Beo',
      'age' => 22
    );
    $this->view('pages/home', $data);
  }

  public function error()
  {
    $this->view('pages/error');
  }
}