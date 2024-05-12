<?php

class getSetStudentInfo
{
   private $db_conn;
   private $read_temp_xml;

   public function __construct()
   {
      require 'connectDb.php';
      require '../controller/php/xmlCtrl.php';
      $this->db_conn = new connectDb();
      $this->read_temp_xml = new xmlCtrl();
   }

   public function insertStudentEntry()
   {
      $xml_student = simplexml_load_file('./xml/temp-entry.xml');

      // Check if XML file is loaded successfully
      if ($xml_student === false) {
         die('Failed to load XML file.');
      }

      $this->db_conn->connect();
      $connection = $this->db_conn->getConnection();

      // Loop through each entry in the XML and store data in the array
      foreach ($xml_student->entry as $entry) {
         $student = [
            'id' => (string)$entry->id,
            'lastname' => (string)$entry->lastname,
            'firstname' => (string)$entry->firstname,
            'middlename' => (string)$entry->middlename,
            'course' => (string)$entry->course,
            'major' => (string)$entry->major,
            'department' => (string)$entry->department,
            'device' => (string)$entry->device,
         ];

         $sql_insrt_entry = "INSERT INTO student_info (std_custom_id, l_name, f_name, m_init_name, course, major, department) VALUES ('{$student['id']}', '{$student['lastname']}', '{$student['firstname']}', '{$student['middlename']}', '{$student['course']}', '{$student['major']}', '{$student['department']}');";

         // ! Execute SQL Command
         if ($connection->query($sql_insrt_entry) === TRUE) {
            $sql_insrt_utility = "INSERT INTO utility (student_id, device, device_date_time) VALUES ('{$student['id']}', '{$student['device']}', NOW());";

            if ($connection->query($sql_insrt_utility) === TRUE) {
               echo "Record inserted successfully";
            } else {
               echo "Error inserting record: " . $connection->error;
            }
         } else {
            echo "Error inserting record: " . $connection->error;
         }
      }

      // Close connection
      $this->db_conn->closeConnection();
   }
}

$run = new getSetStudentInfo();
$run->insertStudentEntry();
