<?php
class DatabaseController
{
   private $config;
   private $pdo;

   public function __construct()
   {
      $this->config = require '../config/config.php';
      $this->pdo = $this->connectTodb();
   }

   private function connectTodb(): ?PDO // Nullable for connection errors.
   {
      $conn = null;
      $dsn = 'mysql:host=' . $this->config['db']['host'] . ';dbname=' . $this->config['db']['dbname'];

      try {
         $conn = new PDO($dsn, $this->config['db']['user'], $this->config['db']['password']);

         // set the PDO error mode to exception.
         $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      } catch (Exception) {
         echo ""; // TODO sned to eroor page.
      }
      return $conn;
   }

   public function getConnection(): ?PDO
   {
      return $this->pdo;
   }
}
