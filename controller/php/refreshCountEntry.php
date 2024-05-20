<?php

$execute = new refreshCountEntry();
class refreshCountEntry
{
   public function countEntry($postData)
   {
      try {
         $refresh_btn_var = $postData['refresh'];

         if (isset($refresh_btn_var)) {
            //$this->removeOldCountEntries(true);
            header('Location: ../../model/countEntries.php');
            exit;
         }
      } catch (Exception $e) {
         throw new Exception("Error: " . $e);
      }
   }
}

$execute->countEntry($_POST);
