<?php

require_once "model/Database.php";

class Applications
{
  private $_db;

  public function __construct()
  {
    $this->_db = new Database();
  }

  public function getApplicationsAsEmployer($username)
  {
    $sql = "SELECT Applications.jobID, Applications.userID, dateApplied, isAcceptedByEmployee, isAcceptedByEmployer, title, description
    FROM Applications
    JOIN Jobs ON Jobs.jobID = Applications.jobID
    WHERE Jobs.userID = :username";
    $this->_db->query($sql);
    $this->_db->bind(':username', $username, PDO::PARAM_STR);
    return $this->_db->fetchAll();
  }

  public function updateEmployerAcceptance($jobID, $username)
  {
    $sql = "UPDATE Applications
    SET isAcceptedByEmployer = IF(isAcceptedByEmployer = TRUE, FALSE, TRUE)
    WHERE jobID = :jobID
    AND userID = :username";
    $this->_db->query($sql);
    $this->_db->bind(':username', $username, PDO::PARAM_STR);
    $this->_db->bind(':jobID', $jobID, PDO::PARAM_INT);
    return $this->_db->execute();
  }

  public function updateEmployeeAcceptance($jobID, $username)
  {
    $sql = "UPDATE Applications
    SET isAcceptedByEmployee = IF(isAcceptedByEmployee = TRUE, FALSE, TRUE)
    WHERE jobID = :jobID
    AND userID = :username";
    $this->_db->query($sql);
    $this->_db->bind(':username', $username, PDO::PARAM_STR);
    $this->_db->bind(':jobID', $jobID, PDO::PARAM_INT);
    return $this->_db->execute();
  }

  public function createApplication($jobID, $username)
  {
    $sql = "INSERT INTO Applications(jobID, userID)
    VALUES (:jobID, :username)";
    $this->_db->query($sql);
    $this->_db->bind(':username', $username, PDO::PARAM_STR);
    $this->_db->bind(':jobID', $jobID, PDO::PARAM_INT);
    return $this->_db->execute();
  }

  public function deleteApplication($jobID, $username)
  {
    $sql = "DELETE FROM Applications WHERE jobID = :jobID AND userID = :username";
    $this->_db->query($sql);
    $this->_db->bind(':username', $username, PDO::PARAM_STR);
    $this->_db->bind(':jobID', $jobID, PDO::PARAM_INT);
    return $this->_db->execute();
  }

  public function getAppliedJobs($username)
  {
    $sql = "SELECT title, description, status, isAcceptedByEmployer, isAcceptedByEmployee, dateApplied, J.jobID
    FROM Applications
    JOIN Jobs J ON Applications.jobID = J.jobID
    WHERE Applications.userID = :username;";
    $this->_db->query($sql);
    $this->_db->bind(':username', $username, PDO::PARAM_STR);
    return $this->_db->fetchAll();
  }

  public function getApplicationCount($username)
  {
    $sql = "SELECT count(*) AS count FROM Applications WHERE userID = :username";
    $this->_db->query($sql);
    $this->_db->bind(':username', $username, PDO::PARAM_STR);
    return $this->_db->fetchOne();
  }

  public function getJobOfferedCount($username)
  {
    $sql = "SELECT count(*) AS count
    FROM Applications
    WHERE jobID = (SELECT Jobs.jobID FROM Jobs WHERE Jobs.userID = :username)
    AND isAcceptedByEmployer = TRUE;
    ";
    $this->_db->query($sql);
    $this->_db->bind(':username', $username, PDO::PARAM_STR);
    return $this->_db->fetchOne();
  }

  public function getJobAcceptedCount($username)
  {
    $sql = "SELECT count(*) AS count FROM Applications WHERE userID = :username AND isAcceptedByEmployee = TRUE";
    $this->_db->query($sql);
    $this->_db->bind(':username', $username, PDO::PARAM_STR);
    return $this->_db->fetchOne();
  }
}
