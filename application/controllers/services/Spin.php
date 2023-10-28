<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH.'/libraries/REST_Controller.php';

class Spin extends REST_Controller {
	public function __Construct()
	{
		parent::__construct();
		$this->load->model('UserModel','um');
		$this->date = date('Y-m-d H:i:s');
	}

	public function mainFunction($method)
	{
		if($method != 'POST'){
			$this->response(['status' => 400,'message' =>'Bad request.']);
		}else{
			$check_auth_client = $this->um->check_auth_client();
			if($check_auth_client == true){
				return true;
			}else{
				return false;
			}
		}
	}


	public function getSpins_get()
	{
		$method = $_SERVER['REQUEST_METHOD'];
		if($method != 'GET'){
			$this->response(['status' => 400,'message' =>'Bad request.']);
		} else {
			$check_auth_client = $this->um->check_auth_client();
			if($check_auth_client == true){
				

				$spins = [];

				$spindate = date('Y-m-d');

				$spindata = $this->um->getSpincardDetails("spin s",[],$spindate);

				
				if($spindata->num_rows() > 0){
					foreach ($spindata->result() as $key => $msd) {

						$scrt564 = $this->db->query("SELECT * FROM `user_spin` WHERE user_id = '".$_GET['user_id']."' AND spin_id = '".$msd->spin_id."'")->result_array();

						$spinamount = $this->um->getSpinamoundetails("spin_amount",['spin_id' => $msd->spin_id])->result_array();
						if(count($scrt564) == 0) {
							array_push($spins, array('spin_id' => $msd->spin_id,'spin_title' => $msd->spin_title,'spin_code' => $msd->spin_code, 'spin_desc' => $msd->spin_desc, 'spin_amount' => $msd->spin_amount, 'offer_title' => $msd->offer_title,'state' => $msd->state,'city' => $msd->city,'pincode' => $msd->pincode,'start_date' => $msd->start_date,'end_date' => $msd->end_date,'spin_image' => $msd->spin_image, 'url' => $msd->spin_url,'spin_add_image' => $msd->spin_add_image,'spin_status' => 0,'spinlist' => $spinamount));
						}else {
							// array_push($spins, array('spin_id' => $msd->spin_id,'spin_title' => $msd->spin_title,'spin_code' => $msd->spin_code, 'spin_desc' => $msd->spin_desc, 'spin_amount' => $msd->spin_amount, 'offer_title' => $msd->offer_title,'state' => $msd->state,'city' => $msd->city,'pincode' => $msd->pincode,'start_date' => $msd->start_date,'end_date' => $msd->end_date,'spin_image' => $msd->spin_image, 'url' => $msd->spin_url,'spin_status' => 1,'spinlist' => $spinamount));
						}
						
					}
				}
				$this->response($spins);
			}else{
				$this->response(['status' => 401,'message' =>'Unauthorized.']);
			}
		}
	}


	public function getMySpinCards_post()
	{
		$method = $_SERVER['REQUEST_METHOD'];
		$res = $this->mainFunction($method);
		if($res == 1){
			if(!$this->post('user_id')){
				$this->response(['status'=> 405,'message' =>"Some Perameters Are Missing!"]);
			}else{
				$whr = [
					'user_id' => $this->post('user_id'),
			];

			$spinProducts = [];

				$spin = $this->um->getMySpincardDetails("user_spin u",$whr);

				
				if($spin->num_rows() > 0){
					foreach ($spin->result() as $key => $msd) {
						array_push($spinProducts, array('spin_id' => $msd->spin_id,'spin_title' => $msd->spin_title, 'spin_code' => $msd->spin_code,'spin_desc' => $msd->spin_desc, 'spin_amount' => $msd->spin_amount,'start_date' => $msd->start_date,'end_date' => $msd->end_date, 'url' => $msd->spin_url, 'spin_add_image' => $msd->spin_add_image));
					}
				}
				// $offers = $this->um->getOffersData("offers",$whr)->row_array();
				if($spin){
					$this->response($spinProducts);
				}else{
					$this->response(['status'=> 404,'message' =>"Failed,please try again",'result'=> null]);
				}
			}
		}else{
			$this->response(['status' => 401,'message' =>'Unauthorized.']);
		}
	  
	}


	public function getSpinDetailsById_post()
	{
		$method = $_SERVER['REQUEST_METHOD'];
		$res = $this->mainFunction($method);
		if($res == 1){
			if(!$this->post('spin_id')){
				$this->response(['status'=> 405,'message' =>"Some Perameters Are Missing!"]);
			}else{
				$whr = [
					's.spin_id' => $this->post('spin_id')
			];

			$spinProducts = [];

				$spins = $this->um->getSpinDetails("spin s",$whr)->row_array();

				$spinamount = $this->um->getSpinamoundetails("spin_amount",['spin_id' => $this->post('spin_id')])->result_array();

				if($spins == '') {

					array_push($spinProducts, array());

				}else{

					array_push($spinProducts, array('spin_id' => $spins['spin_id'],'spin_title' => $spins['spin_title'], 'spin_code' => $spins['spin_code'], 'spin_desc' => $spins['spin_desc'],'spin_image' => $spins['spin_image'], 'spin_amount' => $spins['spin_amount'],'offer_title' => $spins['offer_title'],'state' => $spins['state'],'city' => $spins['city'],'pincode' => $spins['pincode'], 'url' => $spins['spin_url'],'spin_add_image' => $spins['spin_add_image'],'spinlist' => $spinamount));

				}

				
						
				if($spins){
					$this->response($spinProducts);
				}else{
					$this->response(['status'=> 404,'message' =>"Failed,please try again",'result'=> null]);
				}
			}
		}else{
			$this->response(['status' => 401,'message' =>'Unauthorized.']);
		}
	  
	}



	public function spinUserinsert_post()
	{
		$method = $_SERVER['REQUEST_METHOD'];
 		$res = $this->mainFunction($method);

     	if($res == 1){
			if(!$this->post('spin_id') && !$this->post('user_id')){
				$this->response(['status'=> 404,'message' =>"Some Perameters Are Missing!"]);
			}else{
				$date= date('Y-m-d H:i:s');
				$userData = [
					        'spin_id' => $this->post('spin_id'),
					        'user_id' => $this->post('user_id'),
					        'amount' => 0,
					        'created_at' => $date
				        ];
				$updateId = $this->um->insertData("user_spin", $userData);
				if($updateId > 0){

					$transactiontype = [
								'transaction_type' => 'Credited',
								'user_id' => $this->post('user_id'),
								'transaction_from' => 'Spin',
								'transaction_amount' => 0,
								'transaction_status' => 'Success',
								'transaction_at' => $this->date,
								'order_id' => uniqid()
							];

							$orderInserted = $this->um->insertData("transactions",$transactiontype);

					$this->response(['status'=> 200,'message' =>"Spin User Inserted Successfully."]);
				}else{
					$this->response(['status'=> 404,'message' =>"Failed, please try again."]);
				}
			}
		}else{
			$this->response(['status' => 401,'message' =>'Unauthorized.']);
		}
	}





}