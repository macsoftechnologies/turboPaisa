<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH.'/libraries/REST_Controller.php';

class Cashfreepayout extends REST_Controller {

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


	public function authToken()
	{
		// $method = $_SERVER['REQUEST_METHOD'];
		// if($method != 'GET'){
		// 	$this->response(['status' => 400,'message' =>'Bad request.']);
		// } else {
			// $check_auth_client = $this->um->check_auth_client();
			// if($check_auth_client == true){
		$curl = curl_init();
		curl_setopt_array($curl, array(
			CURLOPT_URL => 'https://payout-gamma.cashfree.com/payout/v1/authorize',
			CURLOPT_RETURNTRANSFER => true, 
			CURLOPT_ENCODING => '', 
			CURLOPT_MAXREDIRS => 10, 
			CURLOPT_TIMEOUT => 0, 
			CURLOPT_FOLLOWLOCATION => true, 
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => 'POST', 
			CURLOPT_HTTPHEADER => array(
				'X-Client-Id:CF420582CIR8F8F3M8J7DPA0F66G',
				'X-Client-Secret:1bf005166ce803ae68e209424771dcd1a651e092'
		),
	));
		$response = curl_exec($curl);
		curl_close($curl);
		$token_response = json_decode($response);
		return $token_response->data->token;
		// echo "<pre>";
		// print_r($token_response->data->token);

		// }else{
		// 		$this->response(['status' => 401,'message' =>'Unauthorized.']);
		// 	}
		// }

	}

	public function verifyBankDetail_post() 
	{
		$method = $_SERVER['REQUEST_METHOD'];
		$res = $this->mainFunction($method);
		if($res == 1){
			if(!$this->post('bene_id')){
				$this->response(['status'=> 405,'message' =>"Some Perameters Are Missing!"]);
			}else{
		$bene_id = $this->post('bene_id');
		$token = $this->authToken();

		$curl = curl_init();
		curl_setopt_array($curl,array(CURLOPT_URL => 'https://payout-gamma.cashfree.com/payout/v1/getBeneficiary/'.$bene_id,
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => '',
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => 'GET',
			CURLOPT_HTTPHEADER => array(
				'Authorization: Bearer '.$token
			),
	));
		$response = curl_exec($curl);
		curl_close($curl);
		$bank_response = json_decode($response);

		$this->response($bank_response);
		// echo "<pre>";
		// print_r($bank_response);
		}

		}else{
			$this->response(['status' => 401,'message' =>'Unauthorized.']);
		}

	}


	public function addBeneficiary_post()
	{
		$method = $_SERVER['REQUEST_METHOD'];
		$res = $this->mainFunction($method);
		if($res == 1){
			if(!$this->post('bank_account') && !$this->post('bank_ifsc') && !$this->post('name') && !$this->post('phone') && !$this->post('user_id')){
				$this->response(['status'=> 405,'message' =>"Some Perameters Are Missing!"]);
			}else{
		$token = $this->authToken();
		$bank_account=$this->post('bank_account');
		$bank_ifsc=$this->post('bank_ifsc');
		$name=$this->post('name');
		$email=$this->post('email');
		$phone=$this->post('phone');
		$address=$this->post('address');
		$city=$this->post('city');
		$state=$this->post('state');
		$pincode=$this->post('pincode');
		$bene_id=date('dmYhis',time());
		$json_data=new stdclass();
		$json_data->beneId = $bene_id;
		$json_data->name=$name;
		$json_data->email=$email;
		$json_data->phone=$phone;
		$json_data->bankAccount=$bank_account;
		$json_data->ifsc=$bank_ifsc;
		$json_data->address1=$address;
		$json_data->city=$city;
		$json_data->state=$state;
		$json_data->pincode=$pincode;
		$json_post=json_encode($json_data);
		$curl = curl_init();
		curl_setopt_array($curl,array(
			CURLOPT_URL => 'https://payout-gamma.cashfree.com/payout/v1/addBeneficiary',
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => '',
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => 'POST',
			CURLOPT_POSTFIELDS => $json_post,
			CURLOPT_HTTPHEADER => array(
				'Authorization: Bearer '.$token,
				'Content-Type: text/plain'
			),
		));
		$bene_response = curl_exec($curl);
		curl_close($curl);
		$bene_response = json_decode($bene_response);
		$bene_status = $bene_response->status;
	if($bene_status == 'SUCCESS'){

		$date = date('Y-m-d H:i:s');

		$formData = [
		    'beneficiary_name' => $name,
	        'phone_number' => $phone,
	        'email' => $email,
	        'account_number' => $bank_account,
	        'ifsc_code' => $bank_ifsc,
	        'pincode' => $pincode,
	        'address' => $address,
	        'city' => $city,
	        'state' => $state,
	        'bene_id' => $bene_id,
	        'user_id' => $this->post('user_id'),
	        'status' => 'Y',
	        'created_at' => $this->date
		];
	    $insertId = $this->um->insertData("beneficiaries",$formData);

		$this->response(['status' => 200,'message' =>'bank Account Details Verified Succesfully.']);
		// echo "bank Account Details Verified Succesfully";
	}else{
		$this->response(['status' => 400, 'message' => $bene_response->message]);
		// echo $bene_response->message;
	}

	}

		}else{
			$this->response(['status' => 401,'message' =>'Unauthorized.']);
		}
	}


	public function transferAmount_post()
	{
		$method = $_SERVER['REQUEST_METHOD'];
		$res = $this->mainFunction($method);
		if($res == 1){
			if(!$this->post('beneficiary_id') && !$this->post('amount') && !$this->post('user_id') && $this->post('transfer_id')){
				$this->response(['status'=> 405,'message' =>"Some Perameters Are Missing!"]);
			}else{

				$settings =$this->um->getreferralsettings("referral_settings",[])->row_array();

				if($settings['withdrawlimit'] <= $this->post('amount')) {
		$token = $this->authToken();
		$bene_id=$this->post('beneficiary_id');
		$amount= $this->post('amount');
		$transferId = $this->post('transfer_id');
		$json_data=new stdclass();
		$json_data->beneId = $bene_id;
		$json_data->amount=$amount;
		$json_data->transferId=$transferId;
		$json_post=json_encode($json_data);
		$curl = curl_init();
		curl_setopt_array($curl,array(
			CURLOPT_URL => 'https://payout-gamma.cashfree.com/payout/v1/requestTransfer',
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => '',
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => 'POST',
			CURLOPT_POSTFIELDS => $json_post,
			CURLOPT_HTTPHEADER => array(
				'Authorization: Bearer '.$token,
				'Content-Type: text/plain'
			),
		));
		$trans_response = curl_exec($curl);
		curl_close($curl);
		$trans_response = json_decode($trans_response);
		$transfestatus = $trans_response->status;

		if($trans_response->subCode == 409) {

			$this->response(['status' => 409, 'message' => $trans_response->message]);

		}else {
		$date = date('Y-m-d H:i:s');

		$formData = [
		    'reference_id' => $trans_response->data->referenceId,
	        'amount' => $amount,
	        'transfer_id' => $transferId,
	        'status' => '1',
	        'user_id' => $this->post('user_id'),
	        'request_status'=> $trans_response->status,
	        'created_at' => $this->date
		];
	    $insertId = $this->um->insertData("transfers",$formData);

	    $transactiontype = [
			'transaction_type' => 'Debited',
			'user_id' => $this->post('user_id'),
			'transaction_from' => 'Withdraw',
			'transaction_amount' => $amount,
			'transaction_status' => $trans_response->status,
			'transaction_at' => $this->date,
			'order_id' => uniqid()
		];

		$orderInserted = $this->um->insertData("transactions",$transactiontype);
		// echo "<pre>";
		// print_r($trans_response);
		// exit;
	if($transfestatus == 'SUCCESS'){

		


		$this->response(['status' => 200,'message' =>'Transfer completed successfully']);
	}
	else{
		$this->response(['status' => 400, 'message' => $trans_response->message]);
	}

}

}else {

	$this->response(['status' => 200,'message' =>'Minimum transfer amount '.$settings['withdrawlimit'].'/-']);

}

	}

		}else{
			$this->response(['status' => 401,'message' =>'Unauthorized.']);
		}
	}


	public function getTransferStatusDetails() 
	{
		$referenceId = "14057";
		$token = $this->authToken();

		$curl = curl_init();
		curl_setopt_array($curl,array(CURLOPT_URL => 'https://payout-gamma.cashfree.com/payout/v1.1/getTransferStatus?referenceId=JUNOB2018&transferId=657698682',
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => '',
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => 'GET',
			CURLOPT_HTTPHEADER => array(
				'Authorization: Bearer '.$token
			),
	));
		$response = curl_exec($curl);
		curl_close($curl);
		$bank_response = json_decode($response);
		echo "<pre>";
		print_r($bank_response);

	}


	public function getTransactions_get()
	{
		$method = $_SERVER['REQUEST_METHOD'];
		if($method != 'GET'){
			$this->response(['status' => 400,'message' =>'Bad request.']);
		} else {
			$check_auth_client = $this->um->check_auth_client();
			if($check_auth_client == true){

				$transactioncards = [];

				$user_id = $_GET['user_id'];

				$amt = 0;
				$crd = 0;
				$dbt = 0;

				$transactions = $this->um->gettransactions("transactions",['user_id' => $user_id]);

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

				$settings = $this->um->getreferralsettings("referral_settings",[])->row_array();

				
				if($transactions->num_rows() > 0){
					foreach ($transactions->result() as $key => $tr) {

						if($tr->transaction_amount == 0) {

						}else {
							array_push($transactioncards, array('order_id' => $tr->order_id,'transaction_amount' => $tr->transaction_amount,'transaction_type' => $tr->transaction_type,'transaction_from' => $tr->transaction_from, 'transaction_at' => date('d M Y', strtotime($tr->transaction_at)), 'transaction_status' => $tr->transaction_status));
						}
						
					}
				}
				$this->response(['wallet' => $crd-$dbt,'minimumwithdrawamount' => $settings['withdrawlimit'],'taskearnings' => $crd,'withdraw' => $dbt, 'transactions' => $transactioncards]);
			}else{
				$this->response(['status' => 401,'message' =>'Unauthorized.']);
			}
		}
	}


	public function getBeneficiaryDetailsById_post()
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

			$beneficiaries = [];

				$benefiry = $this->um->getBeneficiaryDetails("beneficiaries",$whr);

				
				if($benefiry->num_rows() > 0){
					foreach ($benefiry->result() as $key => $msd) {
						array_push($beneficiaries, array('user_id' => $msd->user_id,'account_number' => $msd->account_number, 'ifsc_code' => $msd->ifsc_code, 'bank_name'=> $msd->bank_name, 'upi_id' => $msd->upi_id));
					}
				}
				if($benefiry){
					$this->response($beneficiaries);
				}else{
					$this->response(['status'=> 404,'message' =>"Failed,please try again",'result'=> null]);
				}
			}
		}else{
			$this->response(['status' => 401,'message' =>'Unauthorized.']);
		}
	  
	}
}
