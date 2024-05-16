<?php

$execute = new updateStudentEntry();

class updateStudentEntry
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

   public function updateStudentEntry()
   {
      try {
         $xml_student = simplexml_load_file('./xml/temp-entry.xml');

         // Check if XML file is loaded successfully
         if ($xml_student === false) {
            throw new Exception('Failed to load XML file.');
         }

         $this->db_conn->connect();
         $connection = $this->db_conn->getConnection();

         foreach ($xml_student->entry as $entry) {
            $student = [
               'noid' => (string)$entry->noid,
               'id' => (string)$entry->id,
               'lastname' => (string)$entry->lastname,
               'firstname' => (string)$entry->firstname,
               'middlename' => (string)$entry->middlename,
               'course' => (string)$entry->course,
               'major' => (string)$entry->major,
               'department' => (string)$entry->department,
               'device' => (string)$entry->device,
               'datetime' => (string)$entry->datetime
            ];

            $sql_update_entry = "UPDATE student_info SET std_custom_id = '{$student['id']}', l_name = '{$student['lastname']}', f_name = '{$student['firstname']}', m_init_name = '{$student['middlename']}' WHERE student_id = '{$student['noid']}';";

            if ($connection->query($sql_update_entry) === TRUE) {
               $sql_update_school_entry = "UPDATE school SET course = '{$student['course']}', major = '{$student['major']}', department = '{$student['department']}' WHERE fk_student_id = '{$student['noid']}';";

               if ($connection->query($sql_update_school_entry) === TRUE) {
                  $sql_update_utility_entry = "UPDATE utility SET device = '{$student['device']}', device_date_time = '{$student['datetime']}' WHERE fk_student_id = '{$student['noid']}';";
                  if ($connection->query($sql_update_utility_entry) === TRUE) {

                     $this->xml_ctrl->removeOldSelectEntry();
                     $this->selectStudentEntry();
                     header('Location: ../controller/php/xmlCtrl.php');
                     exit;
                  } else {
                     throw new Exception("Error update record entry: " . $connection->error);
                  }
               } else {
                  throw new Exception("Error update record entry: " . $connection->error);
               }
            } else {
               throw new Exception("Error update record entry: " . $connection->error);
            }
         }

         // ! Close connection
         $this->db_conn->closeConnection();
      } catch (Exception $e) {
         echo 'Caught exception: ',  $e->getMessage(), "\n";
      }
   }

   public function selectStudentEntry()
   {
      try {
         $this->db_conn->connect();
         $connection = $this->db_conn->getConnection();

         $sql_slct_join_entry = "SELECT si.student_id, si.std_custom_id, si.l_name, si.f_name, si.m_init_name, sc.course, sc.major, sc.department, ut.device, ut.device_date_time FROM student_info si JOIN school sc ON si.student_id = sc.fk_student_id JOIN utility ut ON si.student_id = ut.fk_student_id;";
         $execute_query = $connection->query($sql_slct_join_entry);

         if ($execute_query->num_rows > 0) {
            while ($student_entries_row = $execute_query->fetch_assoc()) {
               $student_id = $student_entries_row['student_id'];
               $std_custom_id = $student_entries_row['std_custom_id'];
               $l_name = $student_entries_row['l_name'];
               $f_name = $student_entries_row['f_name'];
               $m_init_name = $student_entries_row['m_init_name'];
               $course = $student_entries_row['course'];
               $major = $student_entries_row['major'];
               $department = $student_entries_row['department'];
               $device = $student_entries_row['device'];
               $device_date_time = $student_entries_row['device_date_time'];

               $this->xml_ctrl->xmlSelectEntryControl($student_id, $std_custom_id, $l_name, $f_name, $m_init_name, $course, $major, $department, $device, $device_date_time);
            }
         }
         $this->db_conn->closeConnection();
      } catch (Exception $e) {
         echo 'Caught exception: ',  $e->getMessage(), "\n";
      }
   }
}

$execute->updateStudentEntry();
