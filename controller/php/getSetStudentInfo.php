<?php

class getSetStudentInfo
{
   // ! Private Variables
   private $std_custom_id;
   private $lname;
   private $fname;
   private $m_init_name;
   private $course;
   private $major;
   private $department;

   private $util_device;
   private $util_device_date_time;


   // ! Getters
   public function get_std_custom_id()
   {
      return $this->std_custom_id;
   }

   public function get_lname()
   {
      return $this->lname;
   }

   public function get_fname()
   {
      return $this->fname;
   }

   public function get_m_init_name()
   {
      return $this->m_init_name;
   }

   public function get_course()
   {
      return $this->course;
   }

   public function get_major()
   {
      return $this->major;
   }

   public function get_department()
   {
      return $this->department;
   }

   public function get_utility_device()
   {
      return $this->util_device;
   }

   public function get_utility_device_date_time()
   {
      return $this->util_device_date_time;
   }

   // ! Setters
   public function set_std_custom_id($std_custom_id_var)
   {
      $this->std_custom_id = $std_custom_id_var;
   }

   public function set_lname($lname_var)
   {
      $this->lname = $lname_var;
   }

   public function set_fname($fname_var)
   {
      $this->fname = $fname_var;
   }

   public function set_m_init_name($m_init_name_var)
   {
      $this->m_init_name = $m_init_name_var;
   }

   public function set_course($course_var)
   {
      $this->course = $course_var;
   }

   public function set_major($major_var)
   {
      $this->major = $major_var;
   }

   public function set_department($department_var)
   {
      $this->department = $department_var;
   }

   public function set_utility_device($utility_device_var)
   {
      $this->util_device = $utility_device_var;
   }

   public function set_utilit_device_date_time($util_device_date_time_var)
   {
      $this->util_device_date_time = $util_device_date_time_var;
   }
}
