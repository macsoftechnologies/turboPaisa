<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Offers extends CI_Controller {



	public function __Construct(){

		parent::__Construct();

		$this->load->model('UserModel', 'um');

		$this->admin = $this->session->userdata('admin_id');

		// is_logged_in();

	}



	public function index()

	{

		$data['page_title'] = "Coupons";

		$data['offers'] = $this->um->getOffers("offers o",[]);

		$this->settemplate->dashboard("offers/index",$data);

	}

	public function create()

	{

		$data['page_title'] = "Offer Create";

		$data['categories'] = $this->um->getCategories123("categories",[]);

		$data['goals'] = $this->um->getGoals("goals",[]);

		$data['locations']=$this->um->getLocationstates("locations",[]);

		$this->settemplate->dashboard("offers/create",$data);

	}





	public function insert()

	{

		$this->form_validation->set_rules('offer_title','Offer Title', 'trim|required');
		$this->form_validation->set_rules('offer_amount','Offer Amount', 'trim|required');

		if ($this->form_validation->run() == FALSE)

		{	

			$this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

			$this->create();

		}		

		else	

		{

			$image_path = "";
			//insert Image here
			if(isset($_FILES['offer_banner_image']) && $_FILES['offer_banner_image']['size'] > 0){
				$getFlag = 0;
				$imgName = $_FILES['offer_banner_image']['name'];
				$file_size =$_FILES['offer_banner_image']['size'];
				$file_tmp =$_FILES['offer_banner_image']['tmp_name'];

				$temp_tr = explode(".", $_FILES["offer_banner_image"]["name"]);
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

		        
              if($this->input->post('state') == '') {
                  $state = '';
              }else {
                  $state = implode(',', $this->input->post('state'));
              }

              if($this->input->post('city') == '') {
                  $city = '';
              }else {
                  $city = implode(',', $this->input->post('city'));
              }

              if($this->input->post('pincode') == '') {
                  $pincode = '';
              }else {
                  $pincode = implode(',', $this->input->post('pincode'));
              }
			$userData = [

				'offer_title' => $this->input->post('offer_title'),

				'offer_side_title' => $this->input->post('offer_side_title'),

				'category_id' => $this->input->post('category_id'),

				'goal_id' => $this->input->post('goal_id'),

				'offer_button_title' => $this->input->post('offer_button_title'),

				'offer_amount' => $this->input->post('offer_amount'),

				'offer_desc' => $this->input->post('offer_desc'),

				'offer_payble_event' => $this->input->post('offer_payble_event'),

				'start_date' => $this->input->post('start_date'),

				'end_date' => $this->input->post('end_date'),

				'recurring' => $this->input->post('recurring'),

				'priority' => $this->input->post('priority1'),

				'state' => $state,

				'city' => $city,

				'pincode' => $pincode,

				'display_on_tasks' => $this->input->post('display_on_tasks'),

				'min_offers_avail_to_display' => $this->input->post('min_offers_avail_to_display'),

				'terms_and_conditions' => $this->input->post('terms_and_conditions'),

				'offer_banner_image' => $image_path,

				'offer_code' => $randstring,

				'status' => 'Y',

				'created_at' =>  $date

			];

			$userId = $this->um->insertData("offers",$userData);




			if($userId > 0){

				$task_name = $this->input->post('task_name');
				$task_price = $this->input->post('task_price');
				$description = $this->input->post('description');
				$priority = $this->input->post('priority');
				$date = date('Y-m-d');

				if(count($task_name) > 0){
					for ($i=0; $i < count($task_name); $i++) { 


							$itObject = [
							'offer_id' => $userId,
							'task_name' => $task_name[$i],
							'task_price' => $task_price[$i],
							'description' => $description[$i],
							'priority' => $priority[$i]
						];


						$itLastId = $this->um->insertData("tasks",$itObject);
					}
				}

			// 	$mulimage_path = "";
			// //insert Image here
			// if(count($_FILES['image']['name']) < 5){
			// 	for ($i=0; $i < count($_FILES['image']['name']); $i++) { 
			// 		if(isset($_FILES['image']) && $_FILES['image']['size'][$i] > 0){
			// 			$getFlag = 0;
			// 			$imgName = $_FILES['image']['name'][$i];
			// 			$file_size =$_FILES['image']['size'][$i];
			// 			$file_tmp =$_FILES['image']['tmp_name'][$i];

			// 			$temp_tr = explode(".", $_FILES["image"]["name"][$i]);
			// 			$file_ext = end($temp_tr);
						
			// 		  	if($file_size > 10194304){
			// 		  		$getFlag = 2;
			// 		  		$this->session->set_flashdata('error_msg',  "File size must be excately 10.");
			// 		  		// redirect('products/show/'.$product_id);
			// 		    }

			// 		    if($getFlag == 0){
			// 		    	$file_name = round(microtime(true)) . '.' . end($temp_tr).$i;

			// 		    	$img_directory =  "assets/profiles";
			// 		    	if (!file_exists($img_directory)) {
			// 				    mkdir($img_directory, 0777, true);
			// 				}
			// 				$mulimage_path = base_url().$img_directory."/".$file_name;
			// 				move_uploaded_file($file_tmp,$img_directory."/".$file_name);
			// 		    }
			// 		}else{
			// 			$mulimage_path = "";
			// 		}
			// 		$userprofile = [
			// 			'offer_id' => $userId,
			// 			'image' => $mulimage_path,
			// 		];

			// 		$offerId = $this->um->insertData("offer_image",$userprofile);
			// 	}
			// }

				$this->session->set_flashdata('success_msg',  "Offer Created Successfully.");

				redirect('offers');

			}else{

				$this->session->set_flashdata('error_msg',  "Failed, Somthing went wrong.");

				redirect('offers');

			}
		}

			

		}

	}





	public function edit($offer_id)

	{

		$data['page_title'] = "Rates Update";

		$data['categories'] = $this->um->getCategories123("categories",[]);

		$data['goals'] = $this->um->getGoals("goals",[]);

		$data['locations']=$this->um->getLocationstates("locations",[]);

		$data['offers'] = $this->um->getOffers("offers o",['o.offer_id' => $offer_id])->row_array();
		$data['tasks']=$this->um->getOfferTasks("tasks",['offer_id' => $offer_id]);

		$this->settemplate->dashboard("offers/edit",$data);

	}



	public function update($offer_id)

	{
		$whr123 = ['offer_id' => $offer_id];
		$lastId = $this->um->deleteData("tasks", $whr123);

		$this->form_validation->set_rules('offer_title','Offer Title', 'trim|required');
		$this->form_validation->set_rules('offer_amount','Offer Amount', 'trim|required');

		if ($this->form_validation->run() == FALSE)

		{	

			$this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

			$this->edit($offer_id);

		}		

		else	

		{

			$image_path = "";
			//insert Image here
			if(isset($_FILES['offer_banner_image']) && $_FILES['offer_banner_image']['size'] > 0){
				$getFlag = 0;
				$imgName = $_FILES['offer_banner_image']['name'];
				$file_size =$_FILES['offer_banner_image']['size'];
				$file_tmp =$_FILES['offer_banner_image']['tmp_name'];

				$temp_tr = explode(".", $_FILES["offer_banner_image"]["name"]);
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
				$getImg = $this->um->getOffers("offers o",['o.offer_id' => $offer_id])->row_array();
				if($getImg['offer_banner_image'] != ""){
					$image_path = $getImg['offer_banner_image'];
				}else{
					$image_path = "";
				}
			}

			$offers = $this->um->getOffers("offers o",['o.offer_id' => $offer_id])->row_array();

			if($this->input->post('state') == '') {
                  $state = $offers['state'];
              }else {
                  $state = implode(',', $this->input->post('state'));
              }

              if($this->input->post('city') == '') {
                  $city = $offers['city'];
              }else {
                  $city = implode(',', $this->input->post('city'));
              }

              if($this->input->post('pincode') == '') {
                  $pincode = $offers['pincode'];
              }else {
                  $pincode = implode(',', $this->input->post('pincode'));
              }


			$whr = ['offer_id' => $offer_id];

			$date = date('Y-m-d H:i:s');

			$userData = [

				'offer_title' => $this->input->post('offer_title'),

				'offer_side_title' => $this->input->post('offer_side_title'),

				'category_id' => $this->input->post('category_id'),

				'goal_id' => $this->input->post('goal_id'),

				'offer_button_title' => $this->input->post('offer_button_title'),

				'offer_amount' => $this->input->post('offer_amount'),

				'offer_desc' => $this->input->post('offer_desc'),

				'offer_payble_event' => $this->input->post('offer_payble_event'),

				'start_date' => $this->input->post('start_date'),

				'end_date' => $this->input->post('end_date'),

				'priority' => $this->input->post('priority1'),

				'offer_banner_image' => $image_path,

				'state' => $state,

				'city' => $city,

				'pincode' => $pincode,

				'display_on_tasks' => $this->input->post('display_on_tasks'),

				'min_offers_avail_to_display' => $this->input->post('min_offers_avail_to_display'),

				'terms_and_conditions' => $this->input->post('terms_and_conditions')

			];



			$userId = $this->um->updateData("offers",$userData,$whr);

           

			if($userId > 0){

				$task_name = $this->input->post('task_name');
				$task_price = $this->input->post('task_price');
				$description = $this->input->post('description');
				$priority = $this->input->post('priority');
				$date = date('Y-m-d');

				if($task_name == '') {

				}else  {

				if(count($task_name) > 0){
					for ($i=0; $i < count($task_name); $i++) { 


							$itObject = [
							'offer_id' => $offer_id,
							'task_name' => $task_name[$i],
							'task_price' => $task_price[$i],
							'description' => $description[$i],
							'priority' => $priority[$i]
						];


						$itLastId = $this->um->insertData("tasks",$itObject);
					}
				}
			}

				

				$this->session->set_flashdata('success_msg',  "Offer Updated Successfully.");

				redirect('offers');

			}else{

				$this->session->set_flashdata('error_msg',  "Failed, Somthing went wrong.");

				redirect('offers');

			}

			

		}

	}




	public function delete($offer_id)
	{
		$whr = ['offer_id' => $offer_id];
			$lastId = $this->um->deleteData("offers", $whr);
			if($lastId > 0){

				$this->session->set_flashdata('success_msg',  "Offer Delete Successfully.");
			}else{
				$this->session->set_flashdata('error_msg',  "Failed, Somthing went wrong.");
			}
		redirect('offers');
	}


	public function getStates()
	{
		$response = array();
		$cate_id = $this->input->post('state');
		$result = "'" . implode ( "', '", $cate_id ) . "'";
		
		
		$statecities = $this->db->query("SELECT * FROM `locations` WHERE state IN (".$result.") GROUP BY `city`")->result_array();
		$response['cities'] =  $statecities;
		
		echo json_encode($response);
	}


	public function getpincodes()
	{
		$response = array();
		$cate_id = $this->input->post('city');
		$result = "'" . implode ( "', '", $cate_id ) . "'";

		$statecities = $this->db->query("SELECT * FROM `locations` WHERE city IN (".$result.") GROUP BY `pincode`")->result_array();
		$response['mandals'] =  $statecities;
		
		echo json_encode($response);
	}

	

}