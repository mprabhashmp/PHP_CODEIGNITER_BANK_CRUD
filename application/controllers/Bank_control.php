<?php

class Bank_control extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        $this->load->model('Bank_base');
        $this->load->model('Bank_service');
    }

    public function index()
    {
       $bank_service = new Bank_service;
      
    
       $this->db->where('is_deleted IS NULL OR is_deleted = 0', null, false);
       $query = $this->db->get('bank_details');
       $data['item'] = $query->result();

    //$data['item'] = $bank_service->getall();
       
       $this->load->view('View_info', $data);
    }

    function create()
    {
        $this->load->view("Insert_info");
    }

    function saveData()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('bank_name', 'Bank Name', 'required');
        $this->form_validation->set_rules('branch', 'Branch', 'required');
        $this->form_validation->set_rules('acc_no', 'Account Number', 'required');
    
        if ($this->form_validation->run() == FALSE) {
            // Form validation failed, show error messages or redirect back to the form
        
            redirect('bank_control/create');
        } else {
            // Validation passed, proceed with saving the data
            $bank_base = new Bank_base();
            $bank_service = new Bank_service();
    
            $bank_base->setBankName(htmlspecialchars($this->input->post('bank_name'))); // Apply XSS filtering with htmlspecialchars()
            $bank_base->setBranch(htmlspecialchars($this->input->post('branch'))); // Apply XSS filtering with htmlspecialchars()
            $bank_base->setAccNo(htmlspecialchars($this->input->post('acc_no'))); // Apply XSS filtering with htmlspecialchars()
    
            $bank_service->savedetails($bank_base);
    
           
        }
  
        redirect('bank_control/create');
    }


    function edit($id)
    {
        $bank_service = new Bank_service();
        $data['item'] = $bank_service->getedit($id);
        $this->load->view("Update_info", $data);
    }

    function updateData()
    {
        $bank_base = new Bank_base();
        $bank_service =new Bank_service();

        $bank_base->setId($this->input->post('id'));
        $bank_base->setBankName($this->input->post('bank_name', true)); // Enable XSS filtering
        $bank_base->setBranch($this->input->post('branch', true)); // Enable XSS filtering
        $bank_base->setAccNo($this->input->post('acc_no', true)); // Enable XSS filtering

        $bank_service->updatedetails($bank_base);

        echo "Updated!";
        redirect('bank_control/index');
    }

    public function delete($id, $setFlag = true)
    {
            // Set the flag indicating the data was deleted
            $this->db->set('is_deleted', 1); 
            $this->db->where('id', $id);
            $this->db->update('bank_details');
        

       
        redirect('bank_control/index');

    }
}