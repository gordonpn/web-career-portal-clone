<?php

// namespace Controller;

include_once("model/Model.php");

// use \Model\Model;

class Controller
{
  public $model;

  public function __construct()
  {
    $this->model = new Model();
  }

  public function invoke()
  {
    include 'view/home.php';
    //    no specific book requested, return all
    // if (!isset($_GET['book'])) {
    //   $books = $this->model->getBookList();
    //   include 'view/booklist.php';
    // } else {
    // show the requested book
    //   $book = $this->model->getBook($_GET['book']);
    //   include 'view/viewbook.php';
    // }
  }
}
