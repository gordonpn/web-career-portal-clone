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
    $sql = "SELECT title, datePosted, description, companyName, Jobs.userID, city, salary, positionsAvailable, status, firstName, lastName, phoneNumber, email, jobID
    FROM Jobs
    JOIN Location ON Jobs.locationID = Location.locationID
    JOIN Profiles ON Profiles.userID = Jobs.userID
    JOIN Users ON Users.userID = Jobs.userID";
    $this->_db->query($sql);
    return $this->_db->fetchAll();
  }

  public function getJobSearch($keyword)
  {
    $sql = "SELECT title, datePosted, description, companyName, Jobs.userID, city, salary, positionsAvailable, status, firstName, lastName, phoneNumber, email, jobID
    FROM Jobs
    JOIN Location ON Jobs.locationID = Location.locationID
    JOIN Profiles ON Jobs.userID = Profiles.userID
    JOIN Users ON Users.userID = Jobs.userID
    WHERE LOWER(title) LIKE LOWER('%$keyword%')
    OR LOWER(description) LIKE LOWER('%$keyword%')
    OR LOWER(Profiles.companyName) LIKE LOWER('%$keyword%')
    OR LOWER(Profiles.firstName) LIKE LOWER('%$keyword%')
    OR LOWER(Profiles.lastName) LIKE LOWER('%$keyword%')
    OR LOWER(Jobs.userID) LIKE LOWER('%$keyword%')
    OR LOWER(Location.city) LIKE LOWER('%$keyword%');";
    $this->_db->query($sql);
    return $this->_db->fetchAll();
  }

  public function getCategoryJobs($categoryID)
  {
    $sql = "SELECT title, datePosted, description, companyName, Jobs.userID, city, salary, positionsAvailable, status, firstName, lastName, phoneNumber, email, Jobs.jobID
    FROM Jobs
    JOIN Location ON Jobs.locationID = Location.locationID
    JOIN Profiles ON Profiles.userID = Jobs.userID
    JOIN Users ON Users.userID = Jobs.userID
    JOIN Job_Categories JC on Jobs.jobID = JC.jobID
    JOIN Job_Categories_List JCL on JC.jobCategoryID = JCL.jobCategoriesID
    WHERE jobCategoriesID = :categoryID";
    $this->_db->query($sql);
    $this->_db->bind(':categoryID', $categoryID, PDO::PARAM_INT);
    return $this->_db->fetchAll();
  }

  public function getJobsPostedBy($username)
  {
    $sql = "SELECT title, city, salary, description, status, positionsAvailable, datePosted, jobID
    FROM Jobs
    JOIN Location ON Jobs.locationID = Location.locationID
    WHERE userID = :username";
    $this->_db->query($sql);
    $this->_db->bind(':username', $username, PDO::PARAM_STR);
    return $this->_db->fetchAll();
  }

  public function deleteJob($jobID)
  {
    $sql = "DELETE FROM Jobs WHERE jobID = :jobID";
    $this->_db->query($sql);
    $this->_db->bind(':jobID', $jobID, PDO::PARAM_STR);
    return $this->_db->execute();
  }

  public function updateJobStatus($jobID)
  {
    $sql = "UPDATE Jobs SET status = IF(status = 'active', 'expired', 'active') WHERE jobID = :jobID";
    $this->_db->query($sql);
    $this->_db->bind(':jobID', $jobID, PDO::PARAM_STR);
    return $this->_db->execute();
  }

  public function createJob($username, $locationID, $title, $salary, $description, $positionsAvailable)
  {
    $sql = "INSERT INTO Jobs(userID, locationID, title, salary, description, positionsAvailable)
    VALUES (:username, :locationID, :title, :salary, :description, :positionsAvailable)";
    $this->_db->query($sql);
    $this->_db->bind(':username', $username, PDO::PARAM_STR);
    $this->_db->bind(':locationID', $locationID, PDO::PARAM_STR);
    $this->_db->bind(':title', $title, PDO::PARAM_STR);
    $this->_db->bind(':salary', $salary, PDO::PARAM_INT);
    $this->_db->bind(':description', $description, PDO::PARAM_STR);
    $this->_db->bind(':positionsAvailable', $positionsAvailable, PDO::PARAM_INT);
    return $this->_db->lastInsertId();
  }
}
