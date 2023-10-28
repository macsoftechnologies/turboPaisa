<?php
 
 defined("BASEPATH") OR exit("No direct script access allowed");

  class Locations extends CI_Controller {


  	public function __Construct(){

  		parent::__Construct();

  		$this->load->model('UserModel' ,'um');

      $this->load->library('Pagination');

      ini_set('memory_limit', '44M');

  		$this->admin=$this->session->userdata('admin_id');

  	}


  	public function index()
  	{
  		$data['page_title']="Locations";

  		// $data['locations']=$this->um->getLocations("locations",[]);

  		$this->settemplate->dashboard("locations/index",$data);
  	}

    public function loadData123($record=0) {
    $recordPerPage = 10;
    if($record != 0){
      $record = ($record-1) * $recordPerPage;
    }       
        $recordCount = $this->um->getRecordCount456();
        $empRecord = $this->um->getRecord456($record,$recordPerPage);
        $config['base_url'] = base_url().'locations/loadData123';
        $config['use_page_numbers'] = TRUE;
    $config['next_link'] = 'Next';
    $config['prev_link'] = 'Previous';
    $config['total_rows'] = $recordCount;
    $config['per_page'] = $recordPerPage;
    $this->pagination->initialize($config);
    $data['pagination'] = $this->pagination->create_links();
    $data['empData'] = $empRecord;
    echo json_encode($data);    
  }


  	public function create()
  	{
  		$data['page_title']="Locations Create";

  		$this->settemplate->dashboard("locations/create",$data);

  	}


    public function insert()
    {
    	$this->form_validation->set_rules('state','State','trim|required');
    	$this->form_validation->set_rules('city','City','trim|required');
      $this->form_validation->set_rules('pincode','Pincode','trim|required');


    	if($this->form_validation->run() == FALSE)
    	{
    		
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

    		$this->create();
    	}
    	else
    	{

    		
    		$date= date('Y-m-d H:i:s');


    			$userData =[
                      'state' => $this->input->post('state'),
                       'city'  => $this->input->post('city'),
                       'pincode'  => $this->input->post('pincode'),
    			    ];

    			    $userId=$this->um->insertData("locations",$userData);

    			    if($userId>0){
    			    	$this->session->set_flashdata('sucess_msg' ,"Location Created Successfully.");
    			    	redirect('locations');

    			    }else{

        $this->session->set_flashdata('error_msg',  "Failed, Somthing went wrong.");

        redirect('locations');

      }

    		}

    }


    


     
     public function edit($location_id)
     {
          $data['page_title']="Banner Update";
          $data['locations']=$this->um->getLocations("locations",['location_id'=>$location_id])->row_array();

          $this->settemplate->dashboard("locations/edit" ,$data);

     }



     public function update($location_id)
     {

    $this->form_validation->set_rules('state','State','trim|required');
      $this->form_validation->set_rules('city','City','trim|required');
      $this->form_validation->set_rules('pincode','Pincode','trim|required');
    


    if ($this->form_validation->run() == FALSE)

    {
      $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

      $this->edit($location_id);
    }

    else
    {
      
      $whr = ['location_id' => $location_id];

      $date = date('Y-m-d H:i:s');

      $userData = [
            'state' => $this->input->post('state'),
            'city'  => $this->input->post('city'),
            'pincode'  => $this->input->post('pincode'),
      ];



      $userId = $this->um->updateData("locations",$userData,$whr);

           

      if($userId > 0){

        $this->session->set_flashdata('success_msg',  "Location Updated Successfully.");

        redirect('locations');

      }else{

        $this->session->set_flashdata('error_msg',  "Failed, Somthing went wrong.");

        redirect('locations');

      }

      

    }

  }

     

    
          public function delete($location_id)
          {
            $whr=['location_id'=>$location_id];

            $lastId= $this->um->deleteData("locations",$whr);
            if($lastId>0){
              $this->session->set_flashdata('success_msg',  "Location Delete Successfully.");
            }else{
              $this->session->set_flashdata('error_msg',  "Failed, Somthing went wrong.");
            }

            redirect('locations');
          }



    }


        








  