<?php
include 'php/app.php';

/**
 *
 */
class insert
{
private $pdo;
  function __construct()
  {
    $this->pdo = new mysqli_connection;
    $this->pdo = $this->pdo->connect();
    $sql = 'INSERT INTO car (vin , carName, companyName , color , type,	gear	,cylinder,	cost,	price	,drive,	modal,	add_date) VALUES (:vin , :carName, :companyName , :color , :type,	:gear	,:cylinder,	:cost,	:price	,:drive,	:modal,	:add_date) ';
    $this->pdo->query($sql);
  }
}
$n = new insert;
