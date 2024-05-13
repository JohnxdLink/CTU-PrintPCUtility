<?php

class XmlCtrl
{
   private $xmlFilePath = '../../model/xml/temp-entry.xml';
   private $xmlSelectEntryPath = '../model/xml/temp-select-entry.xml';

   public function xmlControl($studentId, $lname, $fname, $middleInit, $course, $major, $department, $device)
   {
      try {
         $xmlStudent = simplexml_load_file($this->xmlFilePath);
         if ($xmlStudent === false) {
            throw new Exception("Failed to load XML file: $this->xmlFilePath");
         }

         $xmlEntry = $xmlStudent->addChild('entry');
         $xmlEntry->addChild('id', $studentId);
         $xmlEntry->addChild('lastname', $lname);
         $xmlEntry->addChild('firstname', $fname);
         $xmlEntry->addChild('middlename', $middleInit);
         $xmlEntry->addChild('course', $course);
         $xmlEntry->addChild('major', $major);
         $xmlEntry->addChild('department', $department);
         $xmlEntry->addChild('device', $device);

         $this->saveXML($xmlStudent, $this->xmlFilePath);
      } catch (Exception $e) {
         echo 'Error: ' . $e->getMessage();
      }
   }

   public function xmlSelectEntryControl($studentId, $lname, $fname, $middleInit, $course, $major, $department, $device, $datetime)
   {
      $execute = new XmlCtrl();

      try {
         $xmlStudent = simplexml_load_file($this->xmlSelectEntryPath);
         if ($xmlStudent === false) {
            throw new Exception("Failed to load XML file: $this->xmlSelectEntryPath");
         }

         // ! Check if the entry already exists
         foreach ($xmlStudent->entry as $entry) {
            if ((string)$entry->id === $studentId && (string)$entry->lastname === $lname && (string)$entry->firstname === $fname && (string)$entry->middlename === $middleInit && (string)$entry->course === $course && (string)$entry->major === $major && (string)$entry->department === $department && (string)$entry->device === $device && (string)$entry->datetime === $datetime) {
               // ! Entry already exists, no need to add it again
               return;
            }
         }

         // ! Entry does not exist, add it to the XML
         $xmlEntry = $xmlStudent->addChild('entry');
         $xmlEntry->addChild('id', $studentId);
         $xmlEntry->addChild('lastname', $lname);
         $xmlEntry->addChild('firstname', $fname);
         $xmlEntry->addChild('middlename', $middleInit);
         $xmlEntry->addChild('course', $course);
         $xmlEntry->addChild('major', $major);
         $xmlEntry->addChild('department', $department);
         $xmlEntry->addChild('device', $device);
         $xmlEntry->addChild('datetime', $datetime);

         $this->saveXML($xmlStudent, $this->xmlSelectEntryPath);
         $execute->removeAllChildNodes();
      } catch (Exception $e) {
         echo 'Error: ' . $e->getMessage();
      }
   }

   public function removeAllChildNodes()
   {
      try {
         if (file_exists($this->xmlFilePath)) {
            $formatDom = new DOMDocument();
            $formatDom->load($this->xmlFilePath);
            $xmlPath = new DOMXPath($formatDom);

            $entries = $xmlPath->query('//entry');
            foreach ($entries as $entry) {
               $entry->parentNode->removeChild($entry);
            }

            $formatDom->save($this->xmlFilePath);
            echo "All child nodes removed successfully.";
         } else {
            throw new Exception("XML file not found: $this->xmlFilePath");
         }
      } catch (Exception $e) {
         echo 'Error: ' . $e->getMessage();
      }
   }

   private function saveXML($xmlStudent, $filePaths)
   {
      try {
         $formatDom = new DOMDocument('1.0');
         $formatDom->preserveWhiteSpace = false;
         $formatDom->formatOutput = true;
         $formatDom->loadXML($xmlStudent->asXML());
         $saveFormatXml = $formatDom->saveXML();

         file_put_contents($filePaths, $saveFormatXml);
      } catch (Exception $e) {
         echo 'Error: ' . $e->getMessage();
      }
   }
}
