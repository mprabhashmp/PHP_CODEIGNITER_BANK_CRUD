<?php

Class Bank_control extends CI_Controller{ 

    function __construct(){

        parent::__construct();

        $this->load->model('Bank_base');
        $this->load->model('Bank_service');
    }
    
    function index(){
        $bank_service = new Bank_service;
        $data['item']=$bank_service->getall();

        $this->load->view('View_info',$data);

    }

    function create(){

        $this->load->view("Insert_info");
    }

    function saveData(){

        $bank_base = new Bank_base();
        $bank_service = new Bank_service();

        $bank_base -> setBankName($this->input->post('bank_name'));
        $bank_base -> setBranch($this->input->post('branch'));
        $bank_base -> setAccNo($this->input->post('acc_no'));

        $bank_service -> savedetails($bank_base);

        redirect('bank_control/create');
        echo "<script>alert('Successfully Added !');</script>";
        

        // print_r($bank_base);

    }

    function edit($id){

        $bank_service = new Bank_service();
        $data['item'] = $bank_service->getedit($id);
        

        $this->load->view("Update_info",$data);

    }

    function updateData(){

        $bank_base = new Bank_base();
        $bank_service = new Bank_service();

        $bank_base -> setId($this->input->post('id'));
        $bank_base -> setBankName($this->input->post('bank_name'));
        $bank_base -> setBranch($this->input->post('branch'));
        $bank_base -> setAccNo($this->input->post('acc_no'));

        $bank_service -> updatedetails($bank_base);

        echo "Deleted!";
        redirect('bank_control/index');
        

    }

    function delete($id){
        
        $bank_service = new Bank_service();
        $bank_service->deletedetails($id);
        
        echo"Deleted";
        redirect('bank_control/index');
    }


}