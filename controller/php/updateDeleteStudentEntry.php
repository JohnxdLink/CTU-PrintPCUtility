<?php

$execute = new updateDeleteStudentEntry();

class updateDeleteStudentEntry
{
   private $update_entryPath = '../../model/xml/temp-select-entry.xml';
   private $get_set_update_delete_entry;

   public function __construct()
   {
      require 'getSetUpdateDeleteEntry.php';
      $this->get_set_update_delete_entry = new getSetUpdateDeleteEntry();
   }

   public function update_delete_student_entry($postData)
   {
      try {
         $update_btn_var = $postData['search'];
         $edit_btn_var = $postData['edit'];
         $delete_btn_var = $postData['delete'];

         if (isset($update_btn_var)) {
            $this->read_xml_student_entry($postData['noid']);
         }

         if (isset($delete_btn_var)) {
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
                  // Code here

               }
            }
         }
      } catch (Exception $e) {
         throw new Exception("");
      }
   }
}

$execute->update_delete_student_entry($_POST);
