<?php

$execute = new updateDeleteStudentEntry();

class updateDeleteStudentEntry
{
   private $update_entryPath = '../../model/xml/temp-select-entry.xml';
   private $get_set_update_delete_entry;
   private $save_temp_xml;

   public function __construct()
   {
      require 'getSetUpdateDeleteEntry.php';
      require '../php/xmlCtrl.php';
      $this->get_set_update_delete_entry = new getSetUpdateDeleteEntry();
      $this->save_temp_xml = new xmlCtrl();
   }

   public function update_delete_student_entry($postData)
   {
      try {
         $search_btn_var = $postData['search'];
         $update_btn_var = $postData['update'];
         $delete_btn_var = $postData['delete'];

         if (isset($search_btn_var) || isset($update_btn_var) || isset($delete_btn_var)) {
         }

         if (isset($search_btn_var)) {
            $this->read_xml_student_entry($postData['noid']);
            header('Location: ../../views/admin/index.php');
         }

         if (isset($update_btn_var)) {
            $this->save_temp_xml->xmlReadEntryControl($postData['noid'], $postData['customid'], $postData['lastname'], $postData['firstname'], $postData['middlename'], $postData['course'], $postData['major'], $postData['department'], $postData['device'], $postData['datetime']);
            header('Location: ../../model/updateStudentEntry.php');
         }

         if (isset($delete_btn_var)) {
            $this->save_temp_xml->xmlReadEntryControl($postData['noid'], $postData['customid'], $postData['lastname'], $postData['firstname'], $postData['middlename'], $postData['course'], $postData['major'], $postData['department'], $postData['device'], $postData['datetime']);
            header('Location: ../../model/deleteStudentEntry.php');
         }
      } catch (Exception $e) {
         throw new Exception("");
      }
   }
   public function read_xml_student_entry($post_student_id)
   {
      try {
         $xml_student = simplexml_load_file($this->update_entryPath);

         // Check if XML file is loaded successfully
         if ($xml_student === false) {
            throw new Exception('Failed to load XML file.');
         }

         $entries = [];
         foreach ($xml_student->entry as $entry) {
            $entries[] = [
               'noid' => (string)$entry->student_id,
               'customid' => (string)$entry->stdcustomid,
               'lastname' => (string)$entry->lastname,
               'firstname' => (string)$entry->firstname,
               'middlename' => (string)$entry->middlename,
               'course' => (string)$entry->course,
               'major' => (string)$entry->major,
               'department' => (string)$entry->department,
               'device' => (string)$entry->device,
               'datetime' => (string)$entry->datetime,
            ];
         }

         $countEntries = count($entries);

         if ($countEntries <= 20) {
            foreach ($xml_student->entry as $entry) {
               $student = [
                  'noid' => (string)$entry->student_id,
                  'customid' => (string)$entry->stdcustomid,
                  'lastname' => (string)$entry->lastname,
                  'firstname' => (string)$entry->firstname,
                  'middlename' => (string)$entry->middlename,
                  'course' => (string)$entry->course,
                  'major' => (string)$entry->major,
                  'department' => (string)$entry->department,
                  'device' => (string)$entry->device,
                  'datetime' => (string)$entry->datetime,
               ];

               if ((string)$post_student_id === $student['noid']) {
                  $this->updated_entry($student['noid'], $student['customid'], $student['lastname'], $student['firstname'], $student['middlename'], $student['course'], $student['major'], $student['department'], $student['device'], $student['datetime']);
               }
            }
         } else {
            usort($entries, function ($a, $b) {
               return strcmp($a['noid'], $b['noid']);
            });

            $found = $this->binary_search($entries, $post_student_id);
            if ($found !== null) {
               $this->updated_entry($found['noid'], $found['customid'], $found['lastname'], $found['firstname'], $found['middlename'], $found['course'], $found['major'], $found['department'], $found['device'], $found['datetime']);
            }
         }
      } catch (Exception $e) {
         throw new Exception("An error occurred while reading the XML student entry: " . $e->getMessage());
      }
   }

   public function updated_entry($noid, $customid, $lastname, $firstname, $middlename, $course, $major, $department, $device, $datetime)
   {
      $this->get_set_update_delete_entry->set_noID($noid);
      $this->get_set_update_delete_entry->set_customID($customid);
      $this->get_set_update_delete_entry->set_lastName($lastname);
      $this->get_set_update_delete_entry->set_firstName($firstname);
      $this->get_set_update_delete_entry->set_middleName($middlename);
      $this->get_set_update_delete_entry->set_course($course);
      $this->get_set_update_delete_entry->set_major($major);
      $this->get_set_update_delete_entry->set_department($department);
      $this->get_set_update_delete_entry->set_device($device);
      $this->get_set_update_delete_entry->set_datetime($datetime);

      $this->save_temp_xml->xmlReadEntryControl($this->get_set_update_delete_entry->get_noID(), $this->get_set_update_delete_entry->get_customID(), $this->get_set_update_delete_entry->get_lastName(), $this->get_set_update_delete_entry->get_firstName(), $this->get_set_update_delete_entry->get_middleName(), $this->get_set_update_delete_entry->get_course(), $this->get_set_update_delete_entry->get_major(), $this->get_set_update_delete_entry->get_department(), $this->get_set_update_delete_entry->get_device(), $this->get_set_update_delete_entry->get_datetime());
   }

   public function binary_search($entries, $target_id)
   {
      $low = 0;
      $high = count($entries) - 1;

      while ($low <= $high) {
         $mid = intdiv($low + $high, 2);
         $midVal = $entries[$mid]['noid'];

         if ($midVal < $target_id) {
            $low = $mid + 1;
         } elseif ($midVal > $target_id) {
            $high = $mid - 1;
         } else {
            return $entries[$mid];
         }
      }

      return null;
   }
}

$execute->update_delete_student_entry($_POST);
