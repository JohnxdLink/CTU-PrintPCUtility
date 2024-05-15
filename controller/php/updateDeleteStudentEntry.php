<?php

$execute = new updateDeleteStudentEntry();

class updateDeleteStudentEntry
{
   private $update_entryPath = '../../model/xml/temp-select-entry.xml';

   public function update_delete_student_entry($postData)
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
         }
      } catch (Exception $e) {
         throw new Exception(" Add Student Entry Is Not Set.");
      }
   }
}

$execute->update_delete_student_entry($_POST);
