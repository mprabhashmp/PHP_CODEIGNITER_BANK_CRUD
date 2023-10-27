<?php
namespace App\Models;
use CodeIgniter\Model;

class bank_model extends Model{
    protected $table ='bank_details';
    protected $primaryKey = 'id';
    protected $allowedFields = ['bank_name','branch','acc_no'];

}

?>