<?php
class getDbDetails
{
   private $server_name = "localhost";
   private $root_user = "root";
   private $password = "2315";
   private $database = "print_pc_utility_db";

   public function get_serverName()
   {
      return $this->server_name;
   }

   public function get_rootUser()
   {
      return $this->root_user;
   }

   public function get_password()
   {
      return $this->password;
   }

   public function get_database()
   {
      return $this->database;
   }
}
