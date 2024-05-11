<?php

class addStudentEntry
{
   private $encapsulated_student_info;

   public function __construct()
   {
      require_once 'getSetStudentInfo.php';
      $this->encapsulated_student_info = new getSetStudentInfo();
   }

   public function processAddStudentEntry($postData)
   {
      try {
         $add_btn_submitted_var = $postData['submit'];

         if (isset($add_btn_submitted_var)) {
            $this->encapsulated_student_info->set_std_custom_id($postData['studentId']);
            $this->encapsulated_student_info->set_lname($postData['lname']);
            $this->encapsulated_student_info->set_fname($postData['fname']);

            $middile_initial_var = isset($postData['middleInit']) ? $postData['middleInit'] : "";
            $this->encapsulated_student_info->set_m_init_name($middile_initial_var);

            $this->encapsulated_student_info->set_course($postData['course']);

            $major_var = isset($postData['major']) ? $postData['major'] : "";
            $this->encapsulated_student_info->set_major($major_var);

            $this->encapsulated_student_info->set_department($postData['department']);
            $this->encapsulated_student_info->set_utility_device($postData['device']);
         }
      } catch (Exception $e) {
         throw new Exception(" Add Student Entry Is Not Set.");
      }
   }
}

$runEntry = new addStudentEntry();
$runEntry->processAddStudentEntry($_POST);
