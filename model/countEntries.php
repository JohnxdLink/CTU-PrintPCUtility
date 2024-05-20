<?php

$execute = new countEntries();

class countEntries
{
   private $db_conn;
   private $xml_ctrl;
   private $overall;
   private $today_entries;
   private $ceas;
   private $cme;
   private $coe;
   private $cot;

   public function __construct()
   {
      require 'connectDb.php';
      require '../controller/php/xmlCtrl.php';
      $this->db_conn = new connectDb();
      $this->xml_ctrl = new xmlCtrl();
   }

   public function countAllEntries()
   {
      try {
         $this->db_conn->connect();
         $connection = $this->db_conn->getConnection();

         $sql_cnt_std_entry = "SELECT COUNT(student_id) AS overall FROM student_info;";
         $sql_cnt_today_entry = "SELECT COUNT(*) AS today_entries FROM utility WHERE DATE(device_date_time) = CURDATE();";
         $sql_cnt_ceas = "SELECT COUNT(*) AS ceas FROM school WHERE department = 'CEAS';";
         $sql_cnt_cme = "SELECT COUNT(*) AS cme FROM school WHERE department = 'CME';";
         $sql_cnt_coe = "SELECT COUNT(*) AS coe FROM school WHERE department = 'COE';";
         $sql_cnt_cot = "SELECT COUNT(*) AS cot FROM school WHERE department = 'COT';";

         $execute_query_cnt_std = $connection->query($sql_cnt_std_entry);
         $execute_query_cnt_today = $connection->query($sql_cnt_today_entry);
         $execute_query_cnt_ceas = $connection->query($sql_cnt_ceas);
         $execute_query_cnt_cme = $connection->query($sql_cnt_cme);
         $execute_query_cnt_coe = $connection->query($sql_cnt_coe);
         $execute_query_cnt_cot = $connection->query($sql_cnt_cot);

         if ($execute_query_cnt_std) {
            $result = $execute_query_cnt_std->fetch_assoc();
            $this->overall = $result['overall'];
         }

         if ($execute_query_cnt_today) {
            $result = $execute_query_cnt_today->fetch_assoc();
            $this->today_entries = $result['today_entries'];
         }

         if ($execute_query_cnt_ceas) {
            $result = $execute_query_cnt_ceas->fetch_assoc();
            $this->ceas = $result['ceas'];
         }

         if ($execute_query_cnt_cme) {
            $result = $execute_query_cnt_cme->fetch_assoc();
            $this->cme = $result['cme'];
         }

         if ($execute_query_cnt_coe) {
            $result = $execute_query_cnt_coe->fetch_assoc();
            $this->coe = $result['coe'];
         }

         if ($execute_query_cnt_cot) {
            $result = $execute_query_cnt_cot->fetch_assoc();
            $this->cot = $result['cot'];
         }

         $this->xml_ctrl->countEntry($this->overall, $this->today_entries, $this->ceas, $this->cme, $this->coe, $this->cot);

         $this->db_conn->closeConnection();
      } catch (Exception $e) {
         echo 'Caught exception: ',  $e->getMessage(), "\n";
      }
   }
}

$execute->countAllEntries();
