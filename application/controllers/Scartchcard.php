<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Scartchcard extends CI_Controller {



	public function __Construct(){

		parent::__Construct();

		$this->load->model('UserModel', 'um');

		$this->admin = $this->session->userdata('admin_id');

		// is_logged_in();

	}



	public function index()

	{

		$data['page_title'] = "Scartchcard";

		$data['scartchcard'] = $this->um->getScartchcard("scratchcard",[]);

		$data['greenscartchcard'] = $this->um->getGreenScartchcard("scratchcard",[]);

		$this->settemplate->dashboard("scratchcard/index",$data);

	}

	public function greencard()

	{

		$data['page_title'] = "Scartchcard";

		$data['scartchcard'] = $this->um->getScartchcard("scratchcard",[]);

		$data['greenscartchcard'] = $this->um->getGreenScartchcard("scratchcard",[]);

		$data['users'] = $users = $this->um->getCustomersData("users",[]);

		$data['assignusers'] = $this->um->getAssignGreenScratachCardDetails("scratch_assign_user a",[]);

		$this->settemplate->dashboard("scratchcard/greencard",$data);

	}

	public function usersassign()
	{
				$scratch_id = $this->input->post('scratch_id');
				$user_id = $this->input->post('user_id');

			if(count($user_id) > 0){
					for ($i=0; $i < count($user_id); $i++) {

					if($user_id[0] == 0) {

						$users = $this->um->getCustomersData("users",[]);

						if($users->num_rows() > 0) {
                          foreach ($users->result() as $key => $us) {

                          	$itObject = [
									'user_id' => $us->user_id,
									'scratch_id' => $scratch_id,
								];

								$itLastId = $this->um->insertData("scratch_assign_user",$itObject);

                          }
                      }

					} else {


						$itObject = [
							'user_id' => $user_id[$i],
							'scratch_id' => $scratch_id,
						];

						$itLastId = $this->um->insertData("scratch_assign_user",$itObject);


					}

						
					}
				}
			if($itLastId > 0){
				$this->session->set_flashdata('success_msg',  "ScratchCard Assigned Successfully.");
			}else{
				$this->session->set_flashdata('error_msg',  "Failed, Somthing went wrong.");
			}
			redirect('scartchcard/greencard');
	}

	public function create()

	{

		$data['page_title'] = "Scartchcard Create";

		$data['offers'] = $this->um->getOffers("offers o",[]);

		$this->settemplate->dashboard("scratchcard/create",$data);

	}

	public function greencreate()

	{

		$data['page_title'] = "Scartchcard Create";

		$data['offers'] = $this->um->getOffers("offers o",[]);

		$this->settemplate->dashboard("scratchcard/greencreate",$data);

	}





	public function insert()

	{

		$this->form_validation->set_rules('scratch_title','Scratch card Title', 'trim|required');
		$this->form_validation->set_rules('scratch_amount','Scratchcard Amount', 'trim|required');

		if ($this->form_validation->run() == FALSE)

		{	

			$this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

			$this->create();

		}		

		else	

		{

			$image_path = "";
			//insert Image here
			if(isset($_FILES['scratch_image']) && $_FILES['scratch_image']['size'] > 0){
				$getFlag = 0;
				$imgName = $_FILES['scratch_image']['name'];
				$file_size =$_FILES['scratch_image']['size'];
				$file_tmp =$_FILES['scratch_image']['tmp_name'];

				$temp_tr = explode(".", $_FILES["scratch_image"]["name"]);
				$file_ext = end($temp_tr);
				$expensions= array("jpeg","jpg","png");
				if(in_array($file_ext,$expensions)=== false){
					$getFlag = 1;
					$this->session->set_flashdata(['status' => 401,'message' =>'Invalid File.Image']);
			  	}
			  	if($file_size > 10194304){
			  		$getFlag = 2;
			        $this->session->set_flashdata(['status' => 401,'message' =>'File size must be excately 10 MB.']);
			    }

			    if($getFlag == 0){
			    	$file_name = round(microtime(true)) . '.' . end($temp_tr);

			    	$img_directory =  "assets/profiles";
			    	if (!file_exists($img_directory)) {
					    mkdir($img_directory, 0777, true);
					}
							$image_path = base_url().$img_directory."/".$file_name;
					move_uploaded_file($file_tmp,$img_directory."/".$file_name);
			    }
			}

			$date = date('Y-m-d H:i:s');

			$characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
			$charactersLength = strlen($characters);
        	$randstring = '';
		    if($characters > 0){ 
				 for ($j = 0; $j < 6; $j++) {
		            $randstring .= $characters[rand(0, $charactersLength - 1)];
		        }

			$userData = [

				'scratch_title' => $this->input->post('scratch_title'),

				'scratch_button_title' => $this->input->post('scratch_button_title'),

				'offer_id' => $this->input->post('offer_id'),

				'scratch_amount' => $this->input->post('scratch_amount'),

				'scratch_url' => $this->input->post('scratch_url'),

				'scratch_color' => $this->input->post('scratch_color'),

				'start_date' => $this->input->post('start_date'),

				'end_date' => $this->input->post('end_date'),

				'recoring' => $this->input->post('recoring'),

				'orange_desc' => $this->input->post('orange_desc'),

				'yellow_desc' => $this->input->post('yellow_desc'),

				'blue_desc' => $this->input->post('blue_desc'),

				'type' => $this->input->post('type'),

				'priority' => $this->input->post('priority'),

				'scratch_image' => $image_path,

				'scratch_code' => $randstring,

				'status' => 1,

				'created_at' =>  $date

			];
			



			$userId = $this->um->insertData("scratchcard",$userData);




			if($userId > 0){

				$this->session->set_flashdata('success_msg',  "Scartchcard Created Successfully.");

				redirect('scartchcard');

			}else{

				$this->session->set_flashdata('error_msg',  "Failed, Somthing went wrong.");

				redirect('scartchcard');

			}
		}

			

		}

	}


	public function greeninsert()

	{

		$this->form_validation->set_rules('scratch_title','Scratch card Title', 'trim|required');
		$this->form_validation->set_rules('scratch_amount','Scratchcard Amount', 'trim|required');

		if ($this->form_validation->run() == FALSE)

		{	

			$this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

			$this->create();

		}		

		else	

		{

			$image_path = "";
			//insert Image here
			if(isset($_FILES['scratch_image']) && $_FILES['scratch_image']['size'] > 0){
				$getFlag = 0;
				$imgName = $_FILES['scratch_image']['name'];
				$file_size =$_FILES['scratch_image']['size'];
				$file_tmp =$_FILES['scratch_image']['tmp_name'];

				$temp_tr = explode(".", $_FILES["scratch_image"]["name"]);
				$file_ext = end($temp_tr);
				$expensions= array("jpeg","jpg","png");
				if(in_array($file_ext,$expensions)=== false){
					$getFlag = 1;
					$this->session->set_flashdata(['status' => 401,'message' =>'Invalid File.Image']);
			  	}
			  	if($file_size > 10194304){
			  		$getFlag = 2;
			        $this->session->set_flashdata(['status' => 401,'message' =>'File size must be excately 10 MB.']);
			    }

			    if($getFlag == 0){
			    	$file_name = round(microtime(true)) . '.' . end($temp_tr);

			    	$img_directory =  "assets/profiles";
			    	if (!file_exists($img_directory)) {
					    mkdir($img_directory, 0777, true);
					}
							$image_path = base_url().$img_directory."/".$file_name;
					move_uploaded_file($file_tmp,$img_directory."/".$file_name);
			    }
			}

			$date = date('Y-m-d H:i:s');

			$characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
			$charactersLength = strlen($characters);
        	$randstring = '';
		    if($characters > 0){ 
				 for ($j = 0; $j < 6; $j++) {
		            $randstring .= $characters[rand(0, $charactersLength - 1)];
		        }

			$userData = [

				'scratch_title' => $this->input->post('scratch_title'),

				'scratch_button_title' => $this->input->post('scratch_button_title'),

				'offer_id' => $this->input->post('offer_id'),

				'scratch_amount' => $this->input->post('scratch_amount'),

				'scratch_url' => $this->input->post('scratch_url'),

				'scratch_color' => $this->input->post('scratch_color'),

				'start_date' => $this->input->post('start_date'),

				'end_date' => $this->input->post('end_date'),

				'recoring' => $this->input->post('recoring'),

				'scratch_desc' => $this->input->post('scratch_desc'),
				'type' => $this->input->post('type'),

				'priority' => $this->input->post('priority'),

				'scratch_image' => $image_path,

				'scratch_code' => $randstring,

				'status' => 1,

				'created_at' =>  $date

			];
			



			$userId = $this->um->insertData("scratchcard",$userData);




			if($userId > 0){

				$this->session->set_flashdata('success_msg',  "Scartchcard Created Successfully.");

				redirect('scartchcard/greencard');

			}else{

				$this->session->set_flashdata('error_msg',  "Failed, Somthing went wrong.");

				redirect('scartchcard/greencard');

			}
		}

			

		}

	}





	public function edit($scratch_id)

	{

		$data['page_title'] = "Scartchcard Update";

		$data['offers'] = $this->um->getOffers("offers o",[]);

$data['scartchcard'] = $this->um->getScartchcardDetailsinData("scratchcard s",['s.scratch_id' => $scratch_id])->row_array();

		// echo "<pre>";
		// print_r($data['scartchcard']);
		// exit;

		$this->settemplate->dashboard("scratchcard/edit",$data);

	}



	public function update($scratch_id)

	{

		$this->form_validation->set_rules('scratch_title','Scratch card Title', 'trim|required');
		$this->form_validation->set_rules('scratch_amount','Scratchcard Amount', 'trim|required');

		if ($this->form_validation->run() == FALSE)

		{	

			$this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

			$this->edit($scratch_id);

		}		

		else	

		{

			$image_path = "";
			//insert Image here
			if(isset($_FILES['scratch_image']) && $_FILES['scratch_image']['size'] > 0){
				$getFlag = 0;
				$imgName = $_FILES['scratch_image']['name'];
				$file_size =$_FILES['scratch_image']['size'];
				$file_tmp =$_FILES['scratch_image']['tmp_name'];

				$temp_tr = explode(".", $_FILES["scratch_image"]["name"]);
				$file_ext = end($temp_tr);
				$expensions= array("jpeg","jpg","png");
				if(in_array($file_ext,$expensions)=== false){
					$getFlag = 1;
					$this->session->set_flashdata(['status' => 401,'message' =>'Invalid File.Image']);
			  	}
			  	if($file_size > 10194304){
			  		$getFlag = 2;
			        $this->session->set_flashdata(['status' => 401,'message' =>'File size must be excately 10 MB.']);
			    }

			    if($getFlag == 0){
			    	$file_name = round(microtime(true)) . '.' . end($temp_tr);

			    	$img_directory =  "assets/profiles";
			    	if (!file_exists($img_directory)) {
					    mkdir($img_directory, 0777, true);
					}
						$image_path = base_url().$img_directory."/".$file_name;
					move_uploaded_file($file_tmp,$img_directory."/".$file_name);
			    }
			}else{
				$getImg = $this->um->getScartchcard("scratchcard",['scratch_id' => $scratch_id])->row_array();
				if($getImg['scratch_image'] != ""){
					$image_path = $getImg['scratch_image'];
				}else{
					$image_path = "";
				}
			}


			$whr = ['scratch_id' => $scratch_id];

			$date = date('Y-m-d H:i:s');

			$userData = [

				
				'scratch_title' => $this->input->post('scratch_title'),

				'scratch_button_title' => $this->input->post('scratch_button_title'),

				'offer_id' => $this->input->post('offer_id'),

				'scratch_amount' => $this->input->post('scratch_amount'),

				'recoring' => $this->input->post('recoring'),

				'orange_desc' => $this->input->post('orange_desc'),

				'yellow_desc' => $this->input->post('yellow_desc'),

				'blue_desc' => $this->input->post('blue_desc'),

				'type' => $this->input->post('type'),

				'priority' => $this->input->post('priority'),

				'scratch_url' => $this->input->post('scratch_url'),

				'scratch_color' => $this->input->post('scratch_color'),

				'start_date' => $this->input->post('start_date'),

				'end_date' => $this->input->post('end_date'),

				'scratch_image' => $image_path,
			];



			$userId = $this->um->updateData("scratchcard",$userData,$whr);

           

			if($userId > 0){

				$this->session->set_flashdata('success_msg',  "Scartchcard Updated Successfully.");

				if($this->input->post('scratch_color') == 'Green') {
                    redirect('scartchcard/greencard');
				}else {
					redirect('scartchcard');
				}

				

			}else{

				$this->session->set_flashdata('error_msg',  "Failed, Somthing went wrong.");

				if($this->input->post('scratch_color') == 'Green') {
                    redirect('scartchcard/greencard');
				}else {
					redirect('scartchcard');
				}

			}

			

		}

	}




	public function delete($scratch_id)
	{
		$whr = ['scratch_id' => $scratch_id];
			$lastId = $this->um->deleteData("scratchcard", $whr);
			if($lastId > 0){

				$this->session->set_flashdata('success_msg',  "Scartchcard Delete Successfully.");
			}else{
				$this->session->set_flashdata('error_msg',  "Failed, Somthing went wrong.");
			}
		redirect('scartchcard');
	}

	public function assigndelete($assign_id)
	{
		$whr = ['assign_id' => $assign_id];
			$lastId = $this->um->deleteData("scratch_assign_user", $whr);
			if($lastId > 0){

				$this->session->set_flashdata('success_msg',  "Assign Scartchcard Delete Successfully.");
			}else{
				$this->session->set_flashdata('error_msg',  "Failed, Somthing went wrong.");
			}
		redirect('scartchcard/greencard');
	}

	

}