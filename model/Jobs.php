<?php

require_once "model/Database.php";

class Jobs
{
    private $_db;

    public function __construct()
    {
        $this->_db = new Database();
    }

    public function getJobs()
    {
        $sql =
            "SELECT title, datePosted, description, Profiles.companyName, Jobs.userID, Location.city, salary, positionsAvailable, status
        FROM Jobs
                JOIN Location ON Jobs.locationID = Location.locationID,
            Profiles
        WHERE Profiles.userID = Jobs.userID";
        $this->_db->query($sql);
        return $this->_db->fetchAll();
    }

    public function getJobSearch($keyword)
    {
        $sql = "SELECT title, datePosted, description, Profiles.companyName, Jobs.userID, Location.city, salary, positionsAvailable, status
        FROM Jobs
          JOIN Location ON Jobs.locationID = Location.locationID
          JOIN Profiles ON Jobs.userID = Profiles.userID
         WHERE LOWER(CONCAT(title, '', description, '', Profiles.companyName, '', Jobs.userID, '', Location.city))
           LIKE LOWER('%$keyword%')";
        $this->_db->query($sql);
        return $this->_db->fetchAll();
    }
}
