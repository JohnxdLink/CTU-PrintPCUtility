<?php

require 'getDbDetails.php';

class connectDb
{
   private $serverName;
   private $rootUser;
   private $password;
   private $slctDatabase;

   private $db_details;
   private $connection;

   public function __construct()
   {
      $this->db_details = new getDbDetails();

      $this->serverName = $this->db_details->get_serverName();
      $this->rootUser = $this->db_details->get_rootUser();
      $this->password = $this->db_details->get_password();
      $this->slctDatabase = $this->db_details->get_database();
   }

   public function connect()
   {
      $this->connection = new mysqli($this->serverName, $this->rootUser, $this->password, $this->slctDatabase);
      if ($this->connection->connect_error) {
         die("Connection failed: " . $this->connection->connect_error);
      }
   }

   public function getConnection()
   {
      return $this->connection;
   }

   public function closeConnection()
   {
      $this->connection->close();
   }
}
