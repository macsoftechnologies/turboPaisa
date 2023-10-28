<?php

defined('BASEPATH') OR exit('No direct script access allowed');



class Customers extends CI_Controller {



	public function __Construct(){

		parent::__Construct();

		$this->load->model('UserModel', 'um');

		$this->admin = $this->session->userdata('adminId');

		// is_logged_in();

	}

	public function file_get_contents($ip)
    {
        $ch = curl_init('http://ipinfo.io/' . $ip);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $json = curl_exec($ch);
        curl_close($ch);
        // Decode JSON response
        $ipWhoIsResponse = json_decode($json, true);
        // Country code output, field "country_code"
        return $ipWhoIsResponse;
    }



	public function index()

	{

		$data['page_title'] = "Categories";

	    $data['users'] = $users = $this->um->getCustomersData("users",[]);

	    $usersList = [];

	    if($users->num_rows() > 0){
					foreach ($users->result() as $key => $msd) {

						$ip = $msd->ipaddress;
				        $datasystems = $this->file_get_contents($ip);

				        // echo "<pre>";
				        // print_r($datasystems);
				        // exit;

						array_push($usersList, array('user_id' => $msd->user_id,'name' => $msd->name,'mobile' => $msd->mobile,'email' => $msd->email,'pincode' => $msd->pincode,'device_id' => $msd->device_id, 'gaid' => $msd->gaid, 'ipaddress' => $msd->ipaddress, 'user_unique_id' => $msd->user_unique_id,'referral_id' => $msd->referral_id,'wallet' => $msd->wallet, 'latitude' => $msd->latitude,'status' => $msd->status, 'longitude' => $msd->longitude));
					}
				}


	    $data['usersdata'] = $usersList;			

		$this->settemplate->dashboard("customers/index",$data);

	}


	public function payments()

	{

		$data['page_title'] = "Categories";

	    $data['payments'] = $users = $this->um->getCustomersDataTransferDetails("transfers t",[]);

		$this->settemplate->dashboard("customers/payments",$data);

	}



	public function delete($user_id)
	{
		$whr = ['user_id' => $user_id];
			$lastId = $this->um->deleteData("users", $whr);
			if($lastId > 0){

				$this->session->set_flashdata('success_msg',  "User Delete Successfully.");
			}else{
				$this->session->set_flashdata('error_msg',  "Failed, Somthing went wrong.");
			}
		redirect('customers');
	}

	public function statsinactive($user_id)
	{
		$whr = ['user_id' => $user_id];
		$set = ['status' => 'N'];
			$lastId = $this->um->updateData("users", $set,$whr);
			if($lastId > 0){

				$this->session->set_flashdata('success_msg',  "User In Active Successfully.");
			}else{
				$this->session->set_flashdata('error_msg',  "Failed, Somthing went wrong.");
			}
		redirect('customers');
	}

	public function statusactive($user_id)
	{
		$whr = ['user_id' => $user_id];
		$set = ['status' => 'Y'];
			$lastId = $this->um->updateData("users", $set,$whr);
			if($lastId > 0){

				$this->session->set_flashdata('success_msg',  "User Active Successfully.");
			}else{
				$this->session->set_flashdata('error_msg',  "Failed, Somthing went wrong.");
			}
		redirect('customers');
	}

	

}