<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH.'/libraries/REST_Controller.php';

class Scratchcard extends REST_Controller {
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


	public function getScratchcards_get()
	{
		$method = $_SERVER['REQUEST_METHOD'];
		if($method != 'GET'){
			$this->response(['status' => 400,'message' =>'Bad request.']);
		} else {
			$check_auth_client = $this->um->check_auth_client();
			if($check_auth_client == true){

				$user_id = $_GET['user_id'];

				$amt = 0;
				$crd = 0;
				$dbt = 0;

				$credited = $this->um->gettransactions("transactions",['user_id' => $user_id, 'transaction_type' => 'Credited']);

				$debitedted = $this->um->gettransactions("transactions",['user_id' => $user_id, 'transaction_type' => 'Debited']);

				if($credited->num_rows() > 0) {
					foreach ($credited->result() as $key => $cr) {
						$crd = $cr->transaction_amount+$crd;
					}
				}

				if($debitedted->num_rows() > 0) {
					foreach ($debitedted->result() as $key => $sb) {
						$dbt = $sb->transaction_amount+$dbt;
					}
				}

				$wonscratch = $this->um->getMyScratchcardDetails("user_scratch u",['user_id' => $user_id]);

				if($wonscratch->num_rows() > 0) {
					foreach ($wonscratch->result() as $key => $won) {
						$amt = $won->amount+$amt;
					}
				}
				


				$scratchcards = [];

				$scratchcard_date = date('Y-m-d');

				$scratch = $this->um->getScratchcardData1236008y9798("scratchcard s",['s.status' => '1']);

				$scratchcard_log = $this->db->query("SELECT scratch_id FROM `user_scratch` WHERE user_id = '".$_GET['user_id']."'");

				$value = [];

				if($scratchcard_log->num_rows() > 0){
						foreach ($scratchcard_log->result() as $key => $lsd) {
							$value[] = $lsd->scratch_id;
						}
					}

				
				if($scratch->num_rows() > 0){
					foreach ($scratch->result() as $key => $msd) {

						$scrt564 = $this->db->query("SELECT * FROM `user_scratch` WHERE user_id = '".$_GET['user_id']."' AND scratch_id = '".$msd->scratch_id."'")->result_array();

						if(count($scrt564) == 0) {
							if($msd->scratch_color == 'Green') {
								$assignuser = $this->db->query("SELECT * FROM `scratch_assign_user` WHERE user_id = '".$_GET['user_id']."' AND scratch_id = '".$msd->scratch_id."'")->result_array();
								if(count($assignuser) == 0) {

									array_push($scratchcards, array('scratch_id' => $msd->scratch_id,'scratch_title' => $msd->scratch_title,'scratch_title' => $msd->scratch_title,'scratch_button_title' => $msd->scratch_button_title,'scratch_color' => $msd->scratch_color, 'scratch_code' => $msd->scratch_code,'scratch_image' => $msd->scratch_image, 'orange_desc' => $msd->orange_desc,'type' => $msd->type,'yellow_desc' => $msd->yellow_desc,'blue_desc' => $msd->blue_desc,'offer_title' => $msd->offer_title,'state' => $msd->state,'city' => $msd->city,'pincode' => $msd->pincode, 'scratch_amount' => $msd->scratch_amount,'start_date' => $msd->start_date,'end_date' => $msd->end_date, 'url' => $msd->scratch_url,'scratch_status' => 2));

								}else {
										array_push($scratchcards, array('scratch_id' => $msd->scratch_id,'scratch_title' => $msd->scratch_title,'scratch_title' => $msd->scratch_title,'scratch_button_title' => $msd->scratch_button_title,'scratch_color' => $msd->scratch_color, 'scratch_code' => $msd->scratch_code,'scratch_image' => $msd->scratch_image, 'orange_desc' => $msd->orange_desc,'type' => $msd->type,'yellow_desc' => $msd->yellow_desc,'blue_desc' => $msd->blue_desc,'offer_title' => $msd->offer_title,'state' => $msd->state,'city' => $msd->city,'pincode' => $msd->pincode, 'scratch_amount' => $msd->scratch_amount,'start_date' => $msd->start_date,'end_date' => $msd->end_date, 'url' => $msd->scratch_url,'scratch_status' => 2));
									

								}

							}else {
								array_push($scratchcards, array('scratch_id' => $msd->scratch_id,'scratch_title' => $msd->scratch_title,'scratch_title' => $msd->scratch_title,'scratch_button_title' => $msd->scratch_button_title,'scratch_color' => $msd->scratch_color, 'scratch_code' => $msd->scratch_code,'scratch_image' => $msd->scratch_image, 'orange_desc' => $msd->orange_desc,'type' => $msd->type,'yellow_desc' => $msd->yellow_desc,'blue_desc' => $msd->blue_desc,'offer_title' => $msd->offer_title,'state' => $msd->state,'city' => $msd->city,'pincode' => $msd->pincode, 'scratch_amount' => $msd->scratch_amount,'start_date' => $msd->start_date,'end_date' => $msd->end_date, 'url' => $msd->scratch_url,'scratch_status' => 0));

							}
							

						}else {

							// array_push($scratchcards, array('scratch_id' => $msd->scratch_id,'scratch_title' => $msd->scratch_title,'scratch_title' => $msd->scratch_title,'scratch_button_title' => $msd->scratch_button_title,'scratch_color' => $msd->scratch_color, 'scratch_code' => $msd->scratch_code,'scratch_image' => $msd->scratch_image,'type' => $msd->type,'orange_desc' => $msd->orange_desc,'yellow_desc' => $msd->yellow_desc,'blue_desc' => $msd->blue_desc,'offer_title' => $msd->offer_title,'state' => $msd->state,'city' => $msd->city,'pincode' => $msd->pincode, 'scratch_amount' => $msd->scratch_amount,'start_date' => $msd->start_date,'end_date' => $msd->end_date, 'url' => $msd->scratch_url, 'scratch_status' => 1));
							if($msd->scratch_color == 'Green') {
								$assignuser = $this->db->query("SELECT * FROM `scratch_assign_user` WHERE user_id = '".$_GET['user_id']."' AND scratch_id = '".$msd->scratch_id."'")->result_array();
								if(count($assignuser) == 0) {

								}else {
									array_push($scratchcards, array('scratch_id' => $msd->scratch_id,'scratch_title' => $msd->scratch_title,'scratch_title' => $msd->scratch_title,'scratch_button_title' => $msd->scratch_button_title,'scratch_color' => $msd->scratch_color, 'scratch_code' => $msd->scratch_code,'scratch_image' => $msd->scratch_image,'type' => $msd->type,'orange_desc' => $msd->orange_desc,'yellow_desc' => $msd->yellow_desc,'blue_desc' => $msd->blue_desc,'offer_title' => $msd->offer_title,'state' => $msd->state,'city' => $msd->city,'pincode' => $msd->pincode, 'scratch_amount' => $msd->scratch_amount,'start_date' => $msd->start_date,'end_date' => $msd->end_date, 'url' => $msd->scratch_url, 'scratch_status' => 1));
								}
							}else {
								array_push($scratchcards, array('scratch_id' => $msd->scratch_id,'scratch_title' => $msd->scratch_title,'scratch_title' => $msd->scratch_title,'scratch_button_title' => $msd->scratch_button_title,'scratch_color' => $msd->scratch_color, 'scratch_code' => $msd->scratch_code,'scratch_image' => $msd->scratch_image,'type' => $msd->type,'orange_desc' => $msd->orange_desc,'yellow_desc' => $msd->yellow_desc,'blue_desc' => $msd->blue_desc,'offer_title' => $msd->offer_title,'state' => $msd->state,'city' => $msd->city,'pincode' => $msd->pincode, 'scratch_amount' => $msd->scratch_amount,'start_date' => $msd->start_date,'end_date' => $msd->end_date, 'url' => $msd->scratch_url, 'scratch_status' => 1));

							}
							
						}
						
					}
				}
				$this->response(['wallet' => $crd-$dbt,'moneywon' => $amt,'scratchcardwon' => $wonscratch->num_rows(), 'cards' => $scratchcards]);
			}else{
				$this->response(['status' => 401,'message' =>'Unauthorized.']);
			}
		}
	}


	public function getMyScratchcards_post()
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

			$scratchProducts = [];

				$scratch = $this->um->getMyScratchcardDetails("user_scratch u",$whr);

				
				if($scratch->num_rows() > 0){
					foreach ($scratch->result() as $key => $msd) {
						array_push($scratchProducts, array('scratch_id' => $msd->scratch_id,'scratch_title' => $msd->scratch_title,'scratch_button_title' => $msd->scratch_button_title, 'scratch_code' => $msd->scratch_code,'scratch_color' => $msd->scratch_color, 'scratch_image' => $msd->scratch_image, 'type' => $msd->type,'scratch_desc' => $msd->scratch_desc, 'scratch_amount' => $msd->scratch_amount,'start_date' => $msd->start_date,'end_date' => $msd->end_date, 'url' => $msd->scratch_url));
					}
				}
				// $offers = $this->um->getOffersData("offers",$whr)->row_array();
				if($scratch){
					$this->response($scratchProducts);
				}else{
					$this->response(['status'=> 404,'message' =>"Failed,please try again",'result'=> null]);
				}
			}
		}else{
			$this->response(['status' => 401,'message' =>'Unauthorized.']);
		}
	  
	}


	public function getScratchDetailsById_post()
	{
		$method = $_SERVER['REQUEST_METHOD'];
		$res = $this->mainFunction($method);
		if($res == 1){
			if(!$this->post('scratch_id')){
				$this->response(['status'=> 405,'message' =>"Some Perameters Are Missing!"]);
			}else{
				$whr = [
					's.scratch_id' => $this->post('scratch_id')
			];

			$scratchProducts = [];

				$scratchcard = $this->um->getScartchcardDetailsinData("scratchcard s",$whr)->row_array();

		    if($scratchcard == '') {

			array_push($scratchProducts, array());

				}else{
						array_push($scratchProducts, array('scratch_id' => $scratchcard['scratch_id'],'scratch_title' => $scratchcard['scratch_title'],'scratch_button_title' => $scratchcard['scratch_button_title'],'scratch_color' => $scratchcard['scratch_color'], 'scratch_code' => $scratchcard['scratch_code'],'scratch_image' => $scratchcard['scratch_image'],'type' => $scratchcard['type'], 'orange_desc' => $scratchcard['orange_desc'],'yellow_desc' => $scratchcard['yellow_desc'],'blue_desc' => $scratchcard['blue_desc'],'offer_title' => $scratchcard['offer_title'],'state' => $scratchcard['state'],'city' => $scratchcard['city'],'pincode' => $scratchcard['pincode'], 'scratch_amount' => $scratchcard['scratch_amount'], 'url' => $scratchcard['scratch_url']));

					}
				if($scratchcard){
					$this->response($scratchProducts);
				}else{
					$this->response(['status'=> 404,'message' =>"Failed,please try again",'result'=> null]);
				}
			}
		}else{
			$this->response(['status' => 401,'message' =>'Unauthorized.']);
		}
	  
	}



	public function scratchcardUserinsert_post()
	{
		$method = $_SERVER['REQUEST_METHOD'];
 		$res = $this->mainFunction($method);

     	if($res == 1){
			if(!$this->post('scratch_id') && !$this->post('user_id')){
				$this->response(['status'=> 404,'message' =>"Some Perameters Are Missing!"]);
			}else{
				$date= date('Y-m-d H:i:s');
				$scratchcard = $this->um->getScartchcardDetailsinData("scratchcard s",['s.scratch_id' => $this->post('scratch_id')])->row_array();
				if($scratchcard['scratch_color'] == 'Green') {
                    $amount = $scratchcard['scratch_amount'];
				}else {
					$amount = 0;
				}
				$userData = [
					        'scratch_id' => $this->post('scratch_id'),
					        'user_id' => $this->post('user_id'),
					        'amount' => $amount,
					        'created_at' => $date
				        ];
				$updateId = $this->um->insertData("user_scratch", $userData);
				if($updateId > 0){

					$transactiontype = [
								'transaction_type' => 'Credited',
								'user_id' => $this->post('user_id'),
								'transaction_from' => 'Scratch Card',
								'transaction_amount' => $amount,
								'transaction_status' => 'Success',
								'transaction_at' => $this->date,
								'order_id' => uniqid()
							];

							$orderInserted = $this->um->insertData("transactions",$transactiontype);

					$this->response(['status'=> 200, 'scratch_status'=> 1,'message' =>"Scratch card User Inserted Successfully."]);
				}else{
					$this->response(['status'=> 404,'message' =>"Failed, please try again."]);
				}
			}
		}else{
			$this->response(['status' => 401,'message' =>'Unauthorized.']);
		}
	}


	public function getComparewithoutScratchcards_post()
	{
		$method = $_SERVER['REQUEST_METHOD'];
		$res = $this->mainFunction($method);
		if($res == 1){
			if(!$this->post('user_id')){
				$this->response(['status'=> 405,'message' =>"Some Perameters Are Missing!"]);
			}else{
				$whr = [
					'user_id' => $this->post('user_id')
			];

			$scratchcard = $this->db->query("SELECT scratch_id FROM `user_scratch` WHERE user_id = '".$this->post('user_id')."'");

			if($scratchcard->num_rows() > 0){
					foreach ($scratchcard->result() as $key => $lsd) {
						$value[] = $lsd->scratch_id;
					}
				}

				$whrs = ['scratch_id' => implode(',', $value)];

			$scratchProducts = [];

			$scratch = $this->db->query("SELECT * FROM `scratchcard` WHERE NOT scratch_id = '".implode(',', $value)."'");
				
				if($scratch->num_rows() > 0){
					foreach ($scratch->result() as $key => $msd) {

						array_push($scratchProducts, array('scratch_id' => $msd->scratch_id,'scratch_title' => $msd->scratch_title, 'scratch_code' => $msd->scratch_code,'scratch_color' => $msd->scratch_color, 'orange_desc' => $msd->orange_desc,'yellow_desc' => $msd->yellow_desc,'blue_desc' => $msd->blue_desc, 'scratch_amount' => $msd->scratch_amount,'start_date' => $msd->start_date,'end_date' => $msd->end_date, 'url' => $msd->scratch_url));

						

					}
				}

				// if($scratchlists->num_rows() > 0){
				// 	        foreach ($scratchlists->result() as $key => $msd) {

						
				// 		array_push($scratchProducts, array('scratch_id' => $msd->scratch_id,'scratch_title' => $msd->scratch_title, 'scratch_code' => $msd->scratch_code,'scratch_color' => $msd->scratch_color, 'scratch_desc' => $msd->scratch_desc, 'scratch_amount' => $msd->scratch_amount,'start_date' => $msd->start_date,'end_date' => $msd->end_date, 'url' => $msd->scratch_url));
				// 	}
				// }
				// $offers = $this->um->getOffersData("offers",$whr)->row_array();
				if($scratch){
					$this->response($scratchProducts);
				}else{
					$this->response(['status'=> 404,'message' =>"Failed,please try again",'result'=> null]);
				}
			}
		}else{
			$this->response(['status' => 401,'message' =>'Unauthorized.']);
		}
	  
	}





}