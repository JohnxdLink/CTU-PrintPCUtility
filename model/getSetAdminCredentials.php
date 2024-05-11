<?php

class getSetAdminCredentials
{
   private $admin_username;
   private $admin_password;

   public function get_adminUsername()
   {
      return $this->admin_username;
   }

   public function get_adminPassword()
   {
      return $this->admin_password;
   }

   public function set_adminUsername($admin_username_var)
   {
      $this->admin_username = $admin_username_var;
   }

   public function set_adminPassword($admin_password_var)
   {
      $this->admin_password = $admin_password_var;
   }
}
