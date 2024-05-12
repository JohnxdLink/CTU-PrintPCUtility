<?php

class xmlCtrl
{
   public function xml_control($studentId, $lname, $fname, $middleInit, $course, $major, $department, $device)
   {
      $xml_student = simplexml_load_file('../../model/xml/temp-entry.xml');
      $xml_entry = $xml_student->addChild('entry');
      $xml_entry->addChild('id', $studentId);
      $xml_entry->addChild('lastname', $lname);
      $xml_entry->addChild('firstname', $fname);
      $xml_entry->addChild('middlename', $middleInit);
      $xml_entry->addChild('course', $course);
      $xml_entry->addChild('major', $major);
      $xml_entry->addChild('department', $department);
      $xml_entry->addChild('device', $device);

      $format_dom = new DOMDocument('1.0');
      $format_dom->preserveWhiteSpace = false;
      $format_dom->formatOutput = true;
      $format_dom->loadXML($xml_student->asXML());
      $save_format_xml = $format_dom->saveXML();

      file_put_contents('../../model/xml/temp-entry.xml', $save_format_xml);
   }
}
