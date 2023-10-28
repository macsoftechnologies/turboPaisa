<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH.'/libraries/REST_Controller.php';

class Banners extends REST_Controller {

	public function __Construct()
	{
		parent::__Construct();
		$this->load->model('UserModel', 'um');
		$this->date =date('Y-m-d H:i:s');

	}

	public function mainFunction($method)
	{
		if($method !='POST'){
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


	public function getBanners_get()
	{
		$method=$_SERVER['REQUEST_METHOD'];
		if($method !='GET'){
			$this->response(['status' => 400,'message' =>'Bad request.']);
		}else{

			$check_auth_client=$this->um->check_auth_client();
			if($check_auth_client ==true){
				$banner=$this->um->getBanners("offers",['status' => 'Y'])->result_array();
				$this->response(['status'=> 200,'message' =>"Offer Details",'offers'=> $offer]);
			}else{
				$this->response(['status' => 401,'message' =>'Unauthorized.']);
			}
		}
	}
   



   public function getBannerDetailsById_post()
	{
		$method = $_SERVER['REQUEST_METHOD'];
		$res = $this->mainFunction($method);
		if($res == 1){
			if(!$this->post('banner_id')){
				$this->response(['status'=> 405,'message' =>"Some Perameters Are Missing!"]);
			}else{
				$whr = [
					'banner_id' => $this->post('banner_id')
					//'status' => 'Y'
			];
				$banner = $this->um->getBanners("banner",$whr)->row_array();
				if($banner){
					$this->response(['status'=> 200,'message' =>"Success",'result'=> $banner]);
				}else{
					$this->response(['status'=> 404,'message' =>"Failed,please try again",'result'=> null]);
				}
			}
		}else{
			$this->response(['status' => 401,'message' =>'Unauthorized.']);
		}
	  
	}

	
}