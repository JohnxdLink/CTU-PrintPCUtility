<?php
require_once 'getSetAdminCredentials.php';
require_once 'connectDb.php';

class loginAdmin
{
   private $db_conn;
   private $db_admin_account;
   private $username;
   private $password;

   public function __construct()
   {
      $this->db_conn = new connectDb();
      $this->db_admin_account = new getSetAdminCredentials();
   }

   public function selectAdminCredentials()
   {
      $this->db_conn->connect();
      $connection = $this->db_conn->getConnection();

      $sql_slct_admin = "SELECT username, password FROM admin WHERE admin_id = 1";
      $execute_query = $connection->query($sql_slct_admin);

      if ($execute_query === false) {
         // ! Handle query error
         die("Error executing query: " . $connection->error);
      }

      if ($execute_query->num_rows > 0) {
         $admin_credentials = [];
         while ($admin_row = $execute_query->fetch_assoc()) {
            $admin_credentials[] = [
               'username' => $admin_row['username'],
               'password' => $admin_row['password']
            ];
         }

         if (!empty($admin_credentials)) {
            $admin = $admin_credentials[0];
            $this->db_admin_account->set_adminUsername($admin['username']);
            $this->db_admin_account->set_adminPassword($admin['password']);
         }

         $this->set_username($this->db_admin_account->get_adminUsername());
         $this->set_password($this->db_admin_account->get_adminPassword());
      } else {
         echo "No admin credentials found.";
      }

      $this->db_conn->closeConnection();
   }

   public function get_username()
   {
      return $this->username;
   }

   public function get_password()
   {
      return $this->password;
   }

   public function set_username($username_var)
   {
      $this->username = $username_var;
   }

   public function set_password($password_var)
   {
      $this->password = $password_var;
   }
}
