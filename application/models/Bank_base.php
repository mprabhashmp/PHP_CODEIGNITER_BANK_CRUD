<?php

class Bank_base extends CI_Model{

    var $id;
    var $bank_name;
    var $branch;
    var $acc_no;

     // Getters
     public function getId()
     {
         return $this->id;
     }
 
     public function getBankName()
     {
         return $this->bank_name;
     }
 
     public function getBranch()
     {
         return $this->branch;
     }
 
     public function getAccNo()
     {
         return $this->acc_no;
     }
 
     // Setters
     public function setId($id)
     {
         $this->id = $id;
     }
 
     public function setBankName($bank_name)
     {
         $this->bank_name = $bank_name;
     }
 
     public function setBranch($branch)
     {
         $this->branch = $branch;
     }
 
     public function setAccNo($acc_no)
     {
         $this->acc_no = $acc_no;
     }
 }
    