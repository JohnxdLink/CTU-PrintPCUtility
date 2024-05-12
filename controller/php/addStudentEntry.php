<?php

class addStudentEntry
{
   private $encapsulated_student_info;
   private $save_temp_xml;

   public function __construct()
   {
      require 'getSetStudentInfo.php';
      require '../php/xmlCtrl.php';
      $this->encapsulated_student_info = new getSetStudentInfo();
      $this->save_temp_xml = new xmlCtrl();
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

         $this->save_temp_xml->xml_control($this->encapsulated_student_info->get_std_custom_id(), $this->encapsulated_student_info->get_lname(), $this->encapsulated_student_info->get_fname(), $this->encapsulated_student_info->get_m_init_name(), $this->encapsulated_student_info->get_course(), $this->encapsulated_student_info->get_major(), $this->encapsulated_student_info->get_department(), $this->encapsulated_student_info->get_utility_device());
      } catch (Exception $e) {
         throw new Exception(" Add Student Entry Is Not Set.");
      }
   }
}

$runEntry = new addStudentEntry();
$runEntry->processAddStudentEntry($_POST);
