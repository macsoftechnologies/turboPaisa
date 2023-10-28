<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH.'/libraries/REST_Controller.php';

class Admin extends REST_Controller {
	public function __Construct()
	{
		parent::__construct();
		$this->load->model('UserModel','um');
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

	 public function login_post()
	{
		$method = $_SERVER['REQUEST_METHOD'];
 		$res = $this->mainFunction($method);
     	if($res == 1){
			if(!$this->post('emailmobile') && !$this->post('password')){
				$this->response(['status'=> 404,'message' =>"Some Perameters Are Missing!"]);
			}else{
				$emailmobile = $this->post('emailmobile');
				$userpassword = md5($this->post('password'));
				$result = $this->um->check_userlogin($emailmobile,$userpassword);
				if(count($result) > 0){
					$this->response(['status'=> 200,'message' =>"Login Successfully",'userdata' => $result]);
				}else{
					$this->response(['status'=> 404,'message' =>"Invalid Details, Please enter proper details"]);
				}
			}
		}else{
			$this->response(['status' => 401,'message' =>'Unauthorized.']);
		}
	}
}
