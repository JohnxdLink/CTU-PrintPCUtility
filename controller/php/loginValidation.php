<?php

$execute = new loginValidation();

class loginValidation
{
   private $db_conn;
   private $db_admin_account;

   public function __construct()
   {
      require '../../model/connectDb.php';
      require '../../model/getSetAdminCredentials.php';
      $this->db_conn = new connectDb();
      $this->db_admin_account = new getSetAdminCredentials();
   }

   public function processLogin($postData)
   {
      try {
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
               $admin_credentials[] = ['username' => $admin_row['username'], 'password' => $admin_row['password']];
            }

            if (!empty($admin_credentials)) {
               $admin = $admin_credentials[0];
               $this->db_admin_account->set_adminUsername($admin['username']);
               $this->db_admin_account->set_adminPassword($admin['password']);
            }

            $login_btn_var = $postData['submit'];

            if (isset($login_btn_var)) {
               $username = $postData['username'];
               $password = $postData['password'];

               if ($username == $this->db_admin_account->get_adminUsername() && $password == $this->db_admin_account->get_adminPassword()) {
                  echo '<script type="text/javascript">';
                  echo 'alert("Login successfully!");';
                  echo 'window.location.href = "../../views/loading/index.php";';
                  echo '</script>';
               } else {
                  echo '<script type="text/javascript">';
                  echo 'alert("No existed account in database.");';
                  echo 'window.location.href = "../../views/admin/index.php";';
                  echo '</script>';
               }
            }
         } else {
            echo "No admin credentials found.";
         }
      } catch (Exception $e) {
         throw new Exception(" Add Student Entry Is Not Set.");
      }
   }
}

$execute->processLogin($_POST);
