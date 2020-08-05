<?php

require_once "model/Database.php";

class Categories
{
    private $_db;

    public function __construct()
    {
        $this->_db = new Database();
    }

    public function getCategories()
    {
        $sql = "SELECT categoryName, COUNT(jobID) as numPostings
        FROM Job_Categories_List JOIN Job_Categories ON Job_Categories_List.jobCategoriesID = Job_Categories.jobCategoryID
        GROUP BY categoryName";
        $this->_db->query($sql);
        return $this->_db->fetchAll();
    }
}
