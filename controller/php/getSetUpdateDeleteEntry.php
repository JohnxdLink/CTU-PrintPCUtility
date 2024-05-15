<?php

class getSetUpdateDeleteEntry
{
   private $noid;
   private $customid;
   private $lastname;
   private $firstname;
   private $middlename;
   private $course;
   private $major;
   private $department;
   private $device;
   private $datetime;

   public function get_noID()
   {
      return $this->noid;
   }
   public function get_customID()
   {
      return $this->customid;
   }
   public function get_lastName()
   {
      return $this->lastname;
   }
   public function get_firstName()
   {
      return $this->firstname;
   }
   public function get_middleName()
   {
      return $this->middlename;
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
   public function get_device()
   {
      return $this->device;
   }
   public function get_datetime()
   {
      return $this->datetime;
   }

   public function set_noID($noid_var)
   {
      $this->noid = $noid_var;
   }
   public function set_customID($customid_var)
   {
      $this->customid = $customid_var;
   }
   public function set_lastName($lastname_var)
   {
      $this->lastname = $lastname_var;
   }
   public function set_firstName($firstname_var)
   {
      $this->firstname = $firstname_var;
   }
   public function set_middleName($middlename_var)
   {
      $this->middlename = $middlename_var;
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
   public function set_device($device_var)
   {
      $this->device = $device_var;
   }
   public function set_datetime($datetime_var)
   {
      $this->datetime = $datetime_var;
   }
}
