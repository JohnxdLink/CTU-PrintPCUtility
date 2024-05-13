<?php

class getStudentEntry
{
   private $db_conn;
   private $xml_ctrl;

   public function __construct()
   {
      require 'connectDb.php';
      require '../controller/php/xmlCtrl.php';
      $this->db_conn = new connectDb();
      $this->xml_ctrl = new xmlCtrl();
   }

   public function insertStudentEntry()
   {
      try {
         $xml_student = simplexml_load_file('./xml/temp-entry.xml');

         // Check if XML file is loaded successfully
         if ($xml_student === false) {
            throw new Exception('Failed to load XML file.');
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

            $sql_insrt_entry = "INSERT INTO student_info (std_custom_id, l_name, f_name, m_init_name) VALUES ('{$student['id']}', '{$student['lastname']}', '{$student['firstname']}', '{$student['middlename']}');";

            // ! Execute SQL Command
            if ($connection->query($sql_insrt_entry) === TRUE) {
               $lastInsertedId = $connection->insert_id;

               $sql_insrt_school = "INSERT INTO school (fk_student_id, course, major, department) VALUES ($lastInsertedId, '{$student['course']}', '{$student['major']}', '{$student['department']}');";

               if ($connection->query($sql_insrt_school) === TRUE) {

                  $sql_insrt_utility = "INSERT INTO utility (fk_student_id, device, device_date_time) VALUES ($lastInsertedId, '{$student['device']}', NOW());";

                  if ($connection->query($sql_insrt_utility) === TRUE) {
                     $this->xml_ctrl->removeAllChildNodes();
                     header("Location: ../views/admin/index.php");
                     break;
                  } else {
                     throw new Exception("Error inserting record utility: " . $connection->error);
                  }
               } else {
                  throw new Exception("Error inserting record school: " . $connection->error);
               }
            } else {
               throw new Exception("Error inserting record entry: " . $connection->error);
            }
         }

         // Close connection
         $this->db_conn->closeConnection();
      } catch (Exception $e) {
         echo 'Caught exception: ',  $e->getMessage(), "\n";
      }
   }
}

$run = new getStudentEntry();
$run->insertStudentEntry();
