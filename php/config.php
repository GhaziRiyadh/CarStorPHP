<?php
/**
 * connect with databse using PDO
 */
class dbPDO
{
  private $servername;
  private $username;
  private $password;
  private $dbname;
  private $charset;

  public function connect(){
    $this->servername = "localhost";
    $this->username = "root";
    $this->password = "";
    $this->dbname = "biraq";
    $this->charset = "utf8mb4";

    try {
      $dsn = "mysql:host=" . $this->servername . ";dbname=" . $this->dbname . ";charset=" . $this->charset;
      $pdo = new PDO($dns , $this->username , $this->password);
      $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
      return $pdo;
    } catch (PDOException $e) {
      echo "ERROR: Could not connect. on "  . $e->getMessage() . $e->getFile() . " : " . $e->getline();
    }
  }
}

/**
 * mysqli connect
 */
class mysqli_connection
{
    private $host;
    private $user;
    private $pass;
    private $db ;


  function __construct($host  = "127.0.0.1",$user = "root", $pass = "",$db = "biraq")
  {
    $this->host = $host;
    $this->user = $user;
    $this->pass = $pass;
    $this->db = $db;
  }
  public function connect()
  {
    try {
      $conn = new mysqli($this->host, $this->user, $this->pass, $this->db);
      return $conn;
    } catch(mysqli_sql_exception $e) {
      die("Connection failed: " . $e->message() . $e->file() . ":". $e->line());
    }
  }
}
