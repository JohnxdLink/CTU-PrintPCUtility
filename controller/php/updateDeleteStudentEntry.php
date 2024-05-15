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
            if (isset($search_btn_var)) {
               $this->read_xml_student_entry($postData['noid']);
               return;
            }

            if (isset($update_btn_var)) {
               $this->save_temp_xml->xmlReadEntryControl($postData['noid'], $postData['customid'], $postData['lastname'], $postData['firstname'], $postData['middlename'], $postData['course'], $postData['major'], $postData['department'], $postData['device'], $postData['datetime']);
               return;
            }
            header('Location: ../../views/admin/index.php');
         }
      } catch (Exception $e) {
         throw new Exception("");
      }
   }
   public function read_xml_student_entry($post_student_id)
   {
      try {
         $xml_student = simplexml_load_file($this->update_entryPath);

         // ! Check if XML file is loaded successfully
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
                  'datetime' => (string)$entry->datetime
               ];

               if ((string)$post_student_id === $student['noid']) {
                  $this->get_set_update_delete_entry->set_noID($student['noid']);
                  $this->get_set_update_delete_entry->set_customID($student['customid']);
                  $this->get_set_update_delete_entry->set_lastName($student['lastname']);
                  $this->get_set_update_delete_entry->set_firstName($student['firstname']);
                  $this->get_set_update_delete_entry->set_middleName($student['middlename']);
                  $this->get_set_update_delete_entry->set_course($student['course']);
                  $this->get_set_update_delete_entry->set_major($student['major']);
                  $this->get_set_update_delete_entry->set_department($student['department']);
                  $this->get_set_update_delete_entry->set_device($student['device']);
                  $this->get_set_update_delete_entry->set_datetime($student['datetime']);

                  $this->save_temp_xml->xmlReadEntryControl($this->get_set_update_delete_entry->get_noID(), $this->get_set_update_delete_entry->get_customID(), $this->get_set_update_delete_entry->get_lastName(), $this->get_set_update_delete_entry->get_firstName(), $this->get_set_update_delete_entry->get_middleName(), $this->get_set_update_delete_entry->get_course(), $this->get_set_update_delete_entry->get_major(), $this->get_set_update_delete_entry->get_department(), $this->get_set_update_delete_entry->get_device(), $this->get_set_update_delete_entry->get_datetime());
               }
            }
         }
      } catch (Exception $e) {
         throw new Exception("");
      }
   }
}

$execute->update_delete_student_entry($_POST);
