<?php
if (!isset($_SESSION)) {
    session_start();
}

require "model/Categories.php";

class CategoriesController
{
    public $categories;

    public function __construct()
    {
        $this->categories = new Categories();
    }

    public function invoke()
    {
        if (!isset($_SESSION['loggedIn'])) {
            $error = "Please log in first.";
            include 'view/login.php';
            return null;
        }

        if (!$_SESSION['isEmployee']) {
            $error = "You must be an employee to access this page.";
            include 'view/dashboard.php';
            return null;
        }
        $categories = $this->categories->getCategories();
        include 'view/categories.php';
    }
}
