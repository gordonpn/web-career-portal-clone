<?php

class Database
{
  private $_host = '127.0.0.1';
  private $_user = 'gxc353_1';
  private $_pass = 'temp_password';
  private $_name = 'gxc353_1';

  private $_databaseHandler;
  private $_statement;
  private $_error;

  public function __construct()
  {
    $dsn = 'mysql:host=' . $this->_host . ';dbname=' . $this->_name;
    $options = [
      PDO::ATTR_EMULATE_PREPARES => false,
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
      PDO::ATTR_PERSISTENT => true,
    ];

    try {
      $this->_databaseHandler = new PDO($dsn, $this->_user, $this->_pass, $options);
    } catch (PDOException $e) {
      $this->_error = $e->getMessage();
      echo "<p class=\"has-text-black has-background-warning\">$this->_error</p>";
    }
  }

  public function query($sql)
  {
    $this->_statement = $this->_databaseHandler->prepare($sql);
  }

  public function bind($param, $value, $type = null)
  {
    if (is_null($type)) {
      switch (true) {
        case is_int($value):
          $type = PDO::PARAM_INT;
          break;

        case is_bool($value):
          $type = PDO::PARAM_BOOL;
          break;

        case is_null($value):
          $type = PDO::PARAM_NULL;
          break;

        default:
          $type = PDO::PARAM_STR;
      }
    }

    $this->_statement->bindValue($param, $value, $type);
  }

  public function execute()
  {
    try {
      return $this->_statement->execute();
    } catch (PDOException $e) {
      echo "<p class=\"has-text-black has-background-warning\">{$e->getMessage()}</p>";
    }
  }

  public function fetchAll()
  {
    $this->execute();
    return $this->_statement->fetchAll(PDO::FETCH_OBJ);
  }

  public function fetchOne()
  {
    $this->execute();
    return $this->_statement->fetch(PDO::FETCH_OBJ);
  }

  public function rowCount()
  {
    try {
      return $this->_statement->rowCount();
    } catch (PDOException $e) {
      echo "<p class=\"has-text-black has-background-warning\">{$e->getMessage()}</p>";
    }
  }

  public function lastInsertId()
  {
    try {
      $this->_statement->execute();
      return $this->_databaseHandler->lastInsertId();
    } catch (PDOException $e) {
      echo "<p class=\"has-text-black has-background-warning\">{$e->getMessage()}</p>";
    }
  }
}
