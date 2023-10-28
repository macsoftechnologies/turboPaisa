<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH.'/libraries/REST_Controller.php';

class Earngames extends REST_Controller {
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


	public function getEarngames_get()
	{
		$method = $_SERVER['REQUEST_METHOD'];
		if($method != 'GET'){
			$this->response(['status' => 400,'message' =>'Bad request.']);
		} else {
			$check_auth_client = $this->um->check_auth_client();
			if($check_auth_client == true){
				

				$earngames = [];
				$toprelatedgames = [];

				$spindate = date('Y-m-d');

				$earngamesdata = $this->um->getEarngames123("earn_games",[]);

				$toprelated = $this->um->getEarngamesCompleteDetails("earn_games",[]);

				$banner =$this->um->getBanners("banner",['type' => 'earngames'])->result_array();

				if($toprelated->num_rows() > 0){
					foreach ($toprelated->result() as $key => $msd) {

						$scrt564 = $this->db->query("SELECT * FROM `earn_game_log` WHERE user_id = '".$_GET['user_id']."' AND earn_game_id = '".$msd->earn_game_id."'")->result_array();

						if(count($scrt564) == 0) {
							array_push($toprelatedgames, array('earn_game_id' => $msd->earn_game_id,'earn_game_title' => $msd->earn_game_title,'earn_game_code' => $msd->earn_game_code, 'earn_game_desc' => $msd->earn_game_desc, 'earn_game_amount' => $msd->earn_game_amount, 'earn_game_button_title' => $msd->earn_game_button_title,'start_date' => $msd->earn_game_start_date,'end_date' => $msd->earn_game_end_date,'earn_game_image' => $msd->earn_game_image, 'url' => $msd->earn_game_url,'earn_game_status' => 0));
						}else {
							array_push($toprelatedgames, array('earn_game_id' => $msd->earn_game_id,'earn_game_title' => $msd->earn_game_title,'earn_game_code' => $msd->earn_game_code, 'earn_game_desc' => $msd->earn_game_desc, 'earn_game_amount' => $msd->earn_game_amount, 'earn_game_button_title' => $msd->earn_game_button_title,'start_date' => $msd->earn_game_start_date,'end_date' => $msd->earn_game_end_date,'earn_game_image' => $msd->earn_game_image, 'url' => $msd->earn_game_url,'earn_game_status' => 1));
						}
						
					}
				}

				
				if($earngamesdata->num_rows() > 0){
					foreach ($earngamesdata->result() as $key => $msd) {

						$scrt564 = $this->db->query("SELECT * FROM `earn_game_log` WHERE user_id = '".$_GET['user_id']."' AND earn_game_id = '".$msd->earn_game_id."'")->result_array();

						if(count($scrt564) == 0) {
							array_push($earngames, array('earn_game_id' => $msd->earn_game_id,'earn_game_title' => $msd->earn_game_title,'earn_game_code' => $msd->earn_game_code, 'earn_game_desc' => $msd->earn_game_desc, 'earn_game_amount' => $msd->earn_game_amount, 'earn_game_button_title' => $msd->earn_game_button_title,'start_date' => $msd->earn_game_start_date,'end_date' => $msd->earn_game_end_date,'earn_game_image' => $msd->earn_game_image, 'url' => $msd->earn_game_url,'earn_game_status' => 0));
						}else {
							array_push($earngames, array('earn_game_id' => $msd->earn_game_id,'earn_game_title' => $msd->earn_game_title,'earn_game_code' => $msd->earn_game_code, 'earn_game_desc' => $msd->earn_game_desc, 'earn_game_amount' => $msd->earn_game_amount, 'earn_game_button_title' => $msd->earn_game_button_title,'start_date' => $msd->earn_game_start_date,'end_date' => $msd->earn_game_end_date,'earn_game_image' => $msd->earn_game_image, 'url' => $msd->earn_game_url,'earn_game_status' => 1));
						}
						
					}
				}
				$this->response(['banners' => $banner,'recentplayedgames' => $earngames, 'toprelatedgames' => $toprelatedgames]);
			}else{
				$this->response(['status' => 401,'message' =>'Unauthorized.']);
			}
		}
	}


	public function getMyEarngames_post()
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

			$earngamesProducts = [];

				$earngames = $this->um->getMyEarngamesDetails("earn_game_log u",$whr);

				
				if($earngames->num_rows() > 0){
					foreach ($earngames->result() as $key => $msd) {
						array_push($earngamesProducts, array('earn_game_id' => $msd->earn_game_id,'earn_game_title' => $msd->earn_game_title, 'earn_game_code' => $msd->earn_game_code,'earn_game_desc' => $msd->earn_game_desc, 'amount' => $msd->amount,'start_date' => $msd->earn_game_start_date,'end_date' => $msd->earn_game_end_date, 'url' => $msd->earn_game_url));
					}
				}
				// $offers = $this->um->getOffersData("offers",$whr)->row_array();
				if($earngames){
					$this->response($earngamesProducts);
				}else{
					$this->response(['status'=> 404,'message' =>"Failed,please try again",'result'=> null]);
				}
			}
		}else{
			$this->response(['status' => 401,'message' =>'Unauthorized.']);
		}
	  
	}


	public function getEarngameDetailsById_post()
	{
		$method = $_SERVER['REQUEST_METHOD'];
		$res = $this->mainFunction($method);
		if($res == 1){
			if(!$this->post('earn_game_id')){
				$this->response(['status'=> 405,'message' =>"Some Perameters Are Missing!"]);
			}else{
				$whr = [
					'earn_game_id' => $this->post('earn_game_id')
			];

			$earngamesProducts = [];

				$earngames = $this->um->getEarngames("earn_games",$whr)->row_array();

				if($earngames == '') {

					array_push($earngamesProducts, array());

				}else{

					array_push($earngamesProducts, array('earn_game_id' => $earngames['earn_game_id'],'earn_game_title' => $earngames['earn_game_title'], 'earn_game_code' => $earngames['earn_game_code'], 'earn_game_desc' => $earngames['earn_game_desc'],'earn_game_image' => $earngames['earn_game_image'], 'earn_game_amount' => $earngames['earn_game_amount'],'earn_game_button_title' => $earngames['earn_game_button_title'], 'url' => $earngames['earn_game_url']));

				}

				
						
				if($earngames){
					$this->response($earngamesProducts);
				}else{
					$this->response(['status'=> 404,'message' =>"Failed,please try again",'result'=> null]);
				}
			}
		}else{
			$this->response(['status' => 401,'message' =>'Unauthorized.']);
		}
	  
	}



	public function earngamesUserinsert_post()
	{
		$method = $_SERVER['REQUEST_METHOD'];
 		$res = $this->mainFunction($method);

     	if($res == 1){
			if(!$this->post('earn_game_id') && !$this->post('user_id')){
				$this->response(['status'=> 404,'message' =>"Some Perameters Are Missing!"]);
			}else{
				$date= date('Y-m-d H:i:s');
				$userData = [
					        'earn_game_id' => $this->post('earn_game_id'),
					        'user_id' => $this->post('user_id'),
					        'amount' => $this->post('amount'),
					        'created_at' => $date
				        ];
				$updateId = $this->um->insertData("earn_game_log", $userData);
				if($updateId > 0){

					$transactiontype = [
								'transaction_type' => 'Credited',
								'user_id' => $this->post('user_id'),
								'transaction_from' => 'Earn Games',
								'transaction_amount' => $this->post('amount'),
								'transaction_status' => 'Success',
								'transaction_at' => $this->date,
								'order_id' => uniqid()
							];

							$orderInserted = $this->um->insertData("transactions",$transactiontype);

					$this->response(['status'=> 200,'message' =>"Earn Game User Inserted Successfully."]);
				}else{
					$this->response(['status'=> 404,'message' =>"Failed, please try again."]);
				}
			}
		}else{
			$this->response(['status' => 401,'message' =>'Unauthorized.']);
		}
	}





}