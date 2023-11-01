<?php
class Bank_service extends CI_Model{
    function getall(){

        $this->db->select('*');
        $this->db->from('bank_details');
        
        $query = $this->db->get();
        return $query->result();
        
    }

    function savedetails($bank_base){

        $data = array(
            'bank_name'=> $bank_base->getBankName(), 'branch'=> $bank_base->getBranch(), 'acc_no'=> $bank_base->getAccNo()

        );

        return $this->db->insert('bank_details',$data);
    }


    function getedit($id){
        $this->db->select('*');
        $this->db->from('bank_details');
        
        $this->db->where('id',$id);

        $query = $this->db->get();
        return $query->result();
    }


    function updatedetails($bank_base){

        $data = array(
            'bank_name'=> $bank_base->getBankName(), 'branch'=> $bank_base->getBranch(), 'acc_no'=> $bank_base->getAccNo()

        );

        $this->db->where('id',$bank_base->getId());
        return $this->db->update('bank_details',$data);
    }

    function deletedetails($id){

        $this->db->where('id',$id);
        return $this->db->delete('bank_details');
    }

}