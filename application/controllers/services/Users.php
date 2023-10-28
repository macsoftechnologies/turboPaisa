<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH.'/libraries/REST_Controller.php';

class Users extends REST_Controller {
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


    // <--------------------------------  Start Users Data  ---------------------------------->


	public function create_post()
	{
		$method = $_SERVER['REQUEST_METHOD'];
		$res = $this->mainFunction($method);
		if($res == 1){
			//Code for Registration
			if(!$this->post('name') && !$this->post('mobile') && !$this->post('password')){				
				$this->response(['status'=> 405,'message' =>"Some Perameters Are Missing!"]);
			}else{
				$email = $this->post('email');
				$mobileNumber = $this->post('mobile');
				$chek_user = $this->um->checkUserExistOrNot("users",$mobileNumber);
				if($chek_user > 0){
					$this->response(['status'=> 406,'message' =>"User already exists with this mobile number"]);
				}else{
					$date = date('Y-m-d H:i:s');
					$characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
						$charactersLength = strlen($characters);
			        	$randstring = '';
			        	if($characters > 0){ 
						 for ($j = 0; $j < 8; $j++) {
				            $randstring .= $characters[rand(0, $charactersLength - 1)];
				        }
					$formData = [
						    'name' => $this->post('name'),
					        'mobile' => $this->post('mobile'),
					        'email' => $this->post('email'),
					        'user_unique_id' => $randstring,
					        'referral_id' => $this->post('referral_id'),
					        'pincode' => $this->post('pincode'),
					        'device_id' => $this->post('device_id'),
					        'gaid' => $this->post('gaid'),
					        'login_token' => $this->post('login_token'),
					        'ipaddress' => $this->post('ipaddress'),
					        'password' => md5($this->post('password')),
					        'secret_key' => $this->post('password'),
					        'status' => 'N',
					        'created_at' => $this->date
					];
					$insertId = $this->um->insertData("users",$formData);
				}
					if($insertId){

						$mobile_number = $this->post('mobile');
						$otp = $this->saveAndSendOTP($mobile_number);

						//update User OTP
						$updateOTP = $this->um->updateData("users",['otp' => $otp],['user_id'=> $insertId]);
						$userotp = array('user_id' => $insertId,'otp' => $otp);

						$users = $this->um->getCustomersData("users",['user_unique_id' => $this->post('referral_id')])->row_array();

						$referra = $this->um->getreferralsettings("referral_settings",[])->row_array();

						if($users == '') {

						}else {
							$referral = [
								'referral_id' => $this->post('referral_id'),
								'user_id' => $insertId,
								'referral_by_user' => $users['user_id'],
								'referral_amount' => $referra['referral_amount'],
								'referral_at' => $this->date
							];

							$referralinsertId = $this->um->insertData("referral_log",$referral);


							$transactiontype = [
								'transaction_type' => 'Credited',
								'user_id' => $insertId,
								'transaction_from' => 'Referral',
								'transaction_amount' => $referra['referral_amount'],
								'transaction_status' => 'Success',
								'transaction_at' => $this->date,
								'order_id' => uniqid()
							];

							$orderInserted = $this->um->insertData("transactions",$transactiontype);



						}

						$this->response(['status'=> 200,'message' =>"Successfull Registerd.",'result'=> $userotp]);

						$referral123 = [
								'referral_id' => $this->post('referral_id'),
								'user_id' => $users['user_id'],
								'referral_by_user' => $insertId,
								'referral_amount' => $referra['referral_amount'],
								'referral_at' => $this->date
							];

							$referralinsertId123 = $this->um->insertData("referral_log",$referral123);


							$transactiontype123 = [
								'transaction_type' => 'Credited',
								'user_id' => $users['user_id'],
								'transaction_from' => 'Referral',
								'transaction_amount' => $referra['referral_amount'],
								'transaction_status' => 'Success',
								'transaction_at' => $this->date,
								'order_id' => uniqid()
							];

							$orderInserted123 = $this->um->insertData("transactions",$transactiontype123);
					}else{
						$this->response(['status'=> 409,'message' =>"Registration Failed,please try again"]);
					}
				}
			}
		}else{
			$this->response(['status' => 401,'message' =>'Unauthorized.', 'result' => []]);
		}
	}

	public function saveAndSendOTP($mobile_number)
	{
		$digits = 4;
		$otp = str_pad(rand(0, pow(10, $digits)-1), $digits, '0', STR_PAD_LEFT);
		$res = $this->sendSMSToUser($otp,$mobile_number);
		return $otp;
	}

	public function sendSMSToUser($otp,$mobile_number)
	{
	    $sms= "Hello! Your OTP for mobile number verification is: ".$otp.". Please enter this code within the next 15 minutes to complete verification process. Thank you! Intxm";
	    $smsmessage=urlencode($sms);

		$smsapi = "http://nimbusit.info/api/pushsms.php?user=106790&key=010YHLJ00NLV9JKXjjH2&sender=INTXMM&mobile=".$mobile_number."&text=".$smsmessage."&entityid=1701167272475191047&templateid=1107169519916845637";

		$this->file_get_contentss($smsapi);

	}

	public function sendSMSToUserList($otp,$mobile_number)
	{

	    $sms= "Hello! Your password is: ".$otp.". Please enter this password to login to your account. Thank you! Intexm";
	    $smsmessage=urlencode($sms);

	    

		$smsapi = "http://nimbusit.info/api/pushsms.php?user=106790&key=010YHLJ00NLV9JKXjjH2&sender=INTXMM&mobile=".$mobile_number."&text=".$smsmessage."&entityid=1701167272475191047&templateid=1107169702371227138";

		$this->file_get_contentsdata($smsapi);

	}

	public function file_get_contentss($request_url)
    {
        $ch = curl_init($request_url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $json = curl_exec($ch);
        curl_close($ch);
        // Decode JSON response
        $ipWhoIsResponse = json_decode($json, true);
        // Country code output, field "country_code"
        return $ipWhoIsResponse;
    }

    public function file_get_contentsdata($request_url)
    {
        $ch = curl_init($request_url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $json = curl_exec($ch);
        curl_close($ch);
        // Decode JSON response
        $ipWhoIsResponse = json_decode($json, true);
        // Country code output, field "country_code"
        return $ipWhoIsResponse;
    }

	public function verifyOtp_post()
	{
		$method = $_SERVER['REQUEST_METHOD'];
		$res = $this->mainFunction($method);
		if($res == 1){
			if(!$this->post('user_id') && !$this->post('otp')){
				$this->response(['status'=> 405,'message' =>"Some Perameters Are Missing!"]);
			}else{
				$otp = $this->post('otp');
				$userId = $this->post('user_id');
				//get User Otp
				$whr = ['user_id' => $userId];
				$userOtp = $this->um->getUserOtpById("users",$whr);

				$getUser = $this->um->getUserDetailsById("users",$whr);
				if($otp == $userOtp['otp']){
					//update status
					$updateOTP = $this->um->updateData("users",['status' => 'Y'],['user_id'=> $userId]);
					$this->response(['status'=> 200,'message' =>"Success",'result'=> $getUser]);
				}else{
					$this->response(['status'=> 401,'message' =>"Invalid OTP, Enter Proper Details",'result'=>[null]]);
				}
			}
		}else{
			$this->response(['status' => 401,'message' =>'Unauthorized.']);
		}
	}

	 public function login_post()
	{
		$method = $_SERVER['REQUEST_METHOD'];
 		$res = $this->mainFunction($method);
     	if($res == 1){
			if(!$this->post('email') && !$this->post('password') && !$this->post('device_id') && !$this->post('gaid') && !$this->post('ipaddress')){
				$this->response(['status'=> 404,'message' =>"Some Perameters Are Missing!"]);
			}else{

				// $device_id = $this->post('device_id');
				$username = $this->post('email');
				$userpassword = md5($this->post('password'));
				$result = $this->um->check_usersdatalogin($username,$userpassword);

				$ip = $this->post('ipaddress');

                $datasystems = $this->file_get_contents($ip);
                // echo "<pre>";
                // print_r($datasystems);
                // exit;
				$state = $datasystems['region'];
				$city = $datasystems['city'];
				// $pincode = $datasystems['postal'];

				// $latitude = $datasystems['latitude'];
				// $longitude = $datasystems['longitude'];
				$string = $datasystems['loc'];
                $str_arr = explode (",", $string);



				if($result == ''){
					$this->response(['status'=> 404,'message' =>"Invalid Details, Please enter proper details"]);
					
				}else{
					$whr = ['user_id' => $result['user_id']];
				$update = ['device_id' => $this->post('device_id'),'gaid' => $this->post('gaid'),'login_token' => $this->post('login_token'),'ipaddress' => $this->post('ipaddress'),'latitude' => $this->post('lat'),'longitude' => $this->post('lon')
			];

			$users = $this->um->getCustomersData("users",['user_id' => $result['user_id']])->row_array();
				$updateId = $this->um->updateData("users", $update,$whr);
					 $this->response($users);
				}
			}
		}else{
			$this->response(['status' => 401,'message' =>'Unauthorized.']);
		}
	}

	public function getLocation($ip)
    {
        $ch = curl_init('http://ipwhois.app/json/' . $ip);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $json = curl_exec($ch);
        curl_close($ch);
        // Decode JSON response
        $ipWhoIsResponse = json_decode($json, true);
        // Country code output, field "country_code"
        return $ipWhoIsResponse;
    }
	public function getuserDetailsById_post()
	{
		$method = $_SERVER['REQUEST_METHOD'];
		$res = $this->mainFunction($method);
		if($res == 1){
			if(!$this->post('user_id')){
				$this->response(['status'=> 405,'message' =>"Some Perameters Are Missing!"]);
			}else{
				$whr = [
					'user_id' => $this->post('user_id'),
					'status' => 'Y'
			];
				$users = $this->um->getCustomersData("users",$whr)->row_array();

				// $userdetails = [];

				$amt = 0;
				$crd = 0;
				$dbt = 0;

				$credited = $this->um->gettransactions("transactions",['user_id' => $this->post('user_id'), 'transaction_type' => 'Credited']);

				$debitedted = $this->um->gettransactions("transactions",['user_id' => $this->post('user_id'), 'transaction_type' => 'Debited']);

				if($credited->num_rows() > 0) {
					foreach ($credited->result() as $key => $cr) {
						$crd = $cr->transaction_amount+$crd;
					}
				}

				// echo "<pre>";
				// print_r($crd);
				// exit;

				if($debitedted->num_rows() > 0) {
					foreach ($debitedted->result() as $key => $sb) {
						$dbt = $sb->transaction_amount+$dbt;
					}
				}

				if($users == '') {
                   $userdetails = [];
				}else {

				$userdetails = ['user_id' => $users['user_id'],'name' => $users['name'],'mobile' => $users['mobile'],'email' => $users['email'],'pincode' => $users['pincode'],'device_id' => $users['device_id'],'gaid' => $users['gaid'],'login_token' => $users['login_token'], 'user_unique_id' => $users['user_unique_id'], 'referral_id' => $users['referral_id'], 'wallet' => $crd-$dbt, 'task_earnings' => $crd,'withdraw' => $dbt, 'created_at' => $users['created_at'], 'status' => $users['status'], 'profile' => 'https://macsof.in/advertiseApp/assets/149071.png'];
			}

				if($users){
					$this->response($userdetails);
				}else{
					$this->response(['status'=> 404,'message' =>"Failed,please try again",'result'=> []]);
				}
			}
		}else{
			$this->response(['status' => 401,'message' =>'Unauthorized.']);
		}
	  
	}

	public function update_post()
	{
		$method = $_SERVER['REQUEST_METHOD'];
 		$res = $this->mainFunction($method);

     	if($res == 1){
			if(!$this->post('user_id') && !$this->post('name') && !$this->post('mobile') && !$this->post('email') && !$this->post('pincode')){
				$this->response(['status'=> 404,'message' =>"Some Perameters Are Missing!"]);
			}else{
				$whr = ['user_id' => $this->post('user_id')];
				$userData = [
					        'name' => $this->post('name'),
					        'mobile' => $this->post('mobile'),
					        'email' => $this->post('email'),
					        'pincode' => $this->post('pincode'),
				        ];
				$updateId = $this->um->updateData("users", $userData,$whr);
				if($updateId > 0){
					$this->response(['status'=> 200,'message' =>"Profile Updated Successfully."]);
				}else{
					$this->response(['status'=> 404,'message' =>"Failed, please try again."]);
				}
			}
		}else{
			$this->response(['status' => 401,'message' =>'Unauthorized.']);
		}
	}


	public function changePassword_post()
	{
		$method = $_SERVER['REQUEST_METHOD'];
		$res = $this->mainFunction($method);

		if($res == 1){
		if(!$this->post('user_id') && !$this->post('password')){
			$this->response(['status'=> 405,'message' =>"Some Perameters Are Missing!"]);
		}else{
			if($this->post('password') == $this->post('newpassword')) {
				
				$this->response(['status' => 400,'message' =>'Fail','result'=>'New password cannot be the same as your old password.']);
			}else{

				$pwd = md5($this->post('password'));
	        $chk_password = $this->um->checkOldPass("users", ['password' => $pwd, 'user_id' => $this->post('user_id')]);
	       
	        if($chk_password == 0){
	        	$this->response(['status' => 209,'message' =>'Fail','result' => 'Old Password You Entered Was Incorrect']);
	        }else{ 
	          	 $upWhr = ['user_id' => $this->post('user_id')];
	        	 $set = ['password' => md5($this->post('newpassword')),
	        	 'secret_key' => $this->post('newpassword')
	        	];
				 $newpassword = $this->um->updatepass("users",$set,$upWhr);
				 $this->response(['status' => 200,'message' =>'Success','result' => 'Password Updated Successfully']);
	            }

			}
			
            }
        }
	}

	public function forgotPassword_post()
	{
		$method = $_SERVER['REQUEST_METHOD'];
		$res = $this->mainFunction($method);

		if($res == 1){
			if(!$this->post('email')){
				$this->response(['status'=> 405,'message' =>"Some Perameters Are Missing!"]);
			}else{
				$whr = ['mobile' => $this->post('email')];
				$users = $this->um->getCustomersData("users",$whr)->row_array();
				if($users){

				$mobile_number = $this->post('email');
				$otp = $users['secret_key'];
				$send = $this->sendSMSToUserList($otp,$mobile_number);

						//update User OTP
						// $updateOTP = $this->um->updateData("users",['otp' => $otp],['user_id'=> $users['user_id']]);
						$userotp = array('user_id' => $users['user_id'],'secret_key' => $otp);

				

						$this->response(['status'=> 200,'message' =>"Your Password Sent to be Message check it once."]);
					}else{
						$this->response(['status'=> 409,'message' =>"Invalid Mobile Number"]);
					}

				// echo "<pre>";
				// print_r($users);
				// exit;
			}
		}else{
			$this->response(['status' => 401,'message' =>'Unauthorized.']);
		}
	}


	public function forgotchangePassword_post()
	{
		$method = $_SERVER['REQUEST_METHOD'];
		$res = $this->mainFunction($method);

		if($res == 1){
		if(!$this->post('user_id') && !$this->post('password')){
			$this->response(['status'=> 405,'message' =>"Some Perameters Are Missing!"]);
		}else{
			$users = $this->um->getCustomersData("users",['user_id' => $this->post('user_id')])->row_array();
			if($users['password'] == md5($this->post('password'))) {
				
				$this->response(['status' => 400,'message' =>'Fail','result'=>'Old password Newpasswword Matched Please try another password']);
			}else{

				$pwd = md5($this->post('password'));
	        // $chk_password = $this->um->checkOldPass("users", ['password' => $pwd, 'user_id' => $this->post('user_id')]);
	       
	        // if($chk_password == 0){
	        // 	$this->response(['status' => 209,'message' =>'Fail','result' => 'Invalid Old Password Please try again.']);
	        // }else{ 
	          	 $upWhr = ['user_id' => $this->post('user_id')];
	        	 $set = ['password' => md5($this->post('password')),
	        	 'secret_key' => $this->post('password')
	        	];
				 $newpassword = $this->um->updatepass("users",$set,$upWhr);
				 $this->response(['status' => 200,'message' =>'Success','result' => 'Password Updated Successfully']);
	            // }

			}
			
            }
        }
	}

	public function subscribedCreate_post()
	{
		$method = $_SERVER['REQUEST_METHOD'];
 		$res = $this->mainFunction($method);
     	if($res == 1){
			if(!$this->post('email')){
				$this->response(['status'=> 404,'message' =>"Some Perameters Are Missing!"]);
			}else{
					$date = date('Y-m-d H:i:s');
				    $userData = [
					        'email' => $this->post('email'),
					        'status' => 1,
					        'created_at' => $this->date
				        ];
				
				$lastId = $this->um->insertData("subscribed_users", $userData);
				if($lastId > 0){

					$this->response(['status'=> 200,'message' =>"Subscribed user created Successfully."]);

				}else{
					$this->response(['status'=> 404,'message' =>"email, please try again."]);
				}
		}
		}else{
			$this->response(['status' => 401,'message' =>'Unauthorized.']);
		}
	}


	public function quesriesCreate_post()
	{
		$method = $_SERVER['REQUEST_METHOD'];
 		$res = $this->mainFunction($method);
     	if($res == 1){
			if(!$this->post('name') && !$this->post('email') && !$this->post('phone') && !$this->post('message')){
				$this->response(['status'=> 404,'message' =>"Some Perameters Are Missing!"]);
			}else{
					$date = date('Y-m-d H:i:s');
				    $userData = [
					        'name' => $this->post('name'),
					        'email' => $this->post('email'),
					        'phone' => $this->post('phone'),
					        'message' => $this->post('message'),
					        'status' => 1,
					        'created_at' => $this->date
				        ];
				
				$lastId = $this->um->insertData("quaries", $userData);
				if($lastId > 0){

					$this->response(['status'=> 200,'message' =>"Query created Successfully."]);

				}else{
					$this->response(['status'=> 404,'message' =>"email, please try again."]);
				}
		}
		}else{
			$this->response(['status' => 401,'message' =>'Unauthorized.']);
		}
	}


	public function subscribedCreatewithMobile_post()
	{
		$method = $_SERVER['REQUEST_METHOD'];
 		$res = $this->mainFunction($method);
     	if($res == 1){
			if(!$this->post('email') && !$this->post('mobilenumber')){
				$this->response(['status'=> 404,'message' =>"Some Perameters Are Missing!"]);
			}else{
					$date = date('Y-m-d H:i:s');
				    $userData = [
					        'email' => $this->post('email'),
					        'mobilenumber' => $this->post('mobilenumber'),
					        'status' => 1,
					        'created_at' => $this->date
				        ];
				
				$lastId = $this->um->insertData("subscribed_users", $userData);
				if($lastId > 0){




					$email = $this->post('email');
					$mobile_number = $this->post('mobilenumber');
					$to = 'esupport@vysyarajujewellers.com';
		                $subject = 'Vysyaraju jewellers';
		                $message = "<h1>Subscribed User Details</h1>";
		                $message .= "<hr>";
		                $message .= '<p><b>Email:</b> '.$email.'</p>';
		                $message .= '<p><b>Phone:</b> '.$mobile_number.'</p>';
		                
		                
		                $message .= "<hr>";
		              
		                $headers = "MIME-Version: 1.0\r\n";
		                $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
		                // send email
		                mail($to, $subject, $message, $headers);

					$this->response(['status'=> 200,'message' =>"Subscribed user created Successfully."]);

				}else{
					$this->response(['status'=> 404,'message' =>"email, please try again."]);
				}
		}
		}else{
			$this->response(['status' => 401,'message' =>'Unauthorized.']);
		}
	}

	public function file_get_contents($ip)
    {
        $ch = curl_init('ipinfo.io/'.$ip.'?token=8bd02986a64355');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $json = curl_exec($ch);
        curl_close($ch);
        // Decode JSON response
        $ipWhoIsResponse = json_decode($json, true);
        // Country code output, field "country_code"
        return $ipWhoIsResponse;
    }


    public function withdrawAmount_post()
	{
		$method = $_SERVER['REQUEST_METHOD'];
 		$res = $this->mainFunction($method);
     	if($res == 1){
			if(!$this->post('user_id') && !$this->post('amount')){
				$this->response(['status'=> 404,'message' =>"Some Perameters Are Missing!"]);
			}else{

				$settings = $this->um->getBeneficiaryDetails("beneficiaries",['user_id' => $this->post('user_id')])->result_array();

				if(count($settings) == 0) {

					$this->response(['status' => 200,'message' =>'Please Enter Bank Account Details']);
					

		       }else {

		       	$date = date('Y-m-d H:i:s');
				    $userData = [
					        'amount' => $this->post('amount'),
					        'user_id' => $this->post('user_id'),
					        'status' => 1,
					        'request_status' => 'PENDING',
					        'created_at' => $this->date
				        ];
				
				$lastId = $this->um->insertData("transfers", $userData);

				$transactiontype = [
					'transaction_type' => 'Debited',
					'user_id' => $this->post('user_id'),
					'transaction_from' => 'Withdraw',
					'transaction_amount' => $this->post('amount'),
					'transaction_status' => 'Success',
					'transaction_at' => $this->date,
					'order_id' => uniqid()
				];

		       $orderInserted = $this->um->insertData("transactions",$transactiontype);

		       if($lastId > 0){

					$this->response(['status'=> 200,'message' =>"Withdraw Amount created Successfully."]);

				}else{
					$this->response(['status'=> 404,'message' =>"email, please try again."]);
				}

				

			    }
				
		}
		}else{
			$this->response(['status' => 401,'message' =>'Unauthorized.']);
		}
	}


	public function updatelocation_post()
	{
		$method = $_SERVER['REQUEST_METHOD'];
 		$res = $this->mainFunction($method);

     	if($res == 1){
			if(!$this->post('user_id') && !$this->post('latitude') && !$this->post('longitude')){
				$this->response(['status'=> 404,'message' =>"Some Perameters Are Missing!"]);
			}else{
				$whr = ['user_id' => $this->post('user_id')];
				$userData = [
					        'latitude' => $this->post('latitude'),
					        'longitude' => $this->post('longitude'),
				        ];
				$updateId = $this->um->updateData("users", $userData,$whr);
				if($updateId > 0){
					$this->response(['status'=> 200,'message' =>"Location Updated Successfully."]);
				}else{
					$this->response(['status'=> 404,'message' =>"Failed, please try again."]);
				}
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
			if(!$this->post('bank_account') && !$this->post('bank_ifsc') && !$this->post('bank_name') && !$this->post('user_id') && !$this->post('upi_id')){
				$this->response(['status'=> 405,'message' =>"Some Perameters Are Missing!"]);
			}else{
	

		$date = date('Y-m-d H:i:s');

		$formData = [
			'bank_name' => $this->post('bank_name'),
			'upi_id' => $this->post('upi_id'),
	        'account_number' => $this->post('bank_account'),
	        'ifsc_code' => $this->post('bank_ifsc'),
	        'user_id' => $this->post('user_id'),
	        'status' => 'Y',
	        'created_at' => $this->date
		];
	    $insertId = $this->um->insertData("beneficiaries",$formData);

	    if($insertId > 0){
            $this->response(['status'=> 200,'message' =>"Payment Details Inserted Successfully."]);
		}else{
			$this->response(['status'=> 404,'message' =>"Failed, please try again."]);
		}

	}

		}else{
			$this->response(['status' => 401,'message' =>'Unauthorized.']);
		}
	}


	public function resendOtp_post()
	{
		$method = $_SERVER['REQUEST_METHOD'];
		$res = $this->mainFunction($method);
		if($res == 1){
			//Code for Registration
			if(!$this->post('mobile')){				
				$this->response(['status'=> 405,'message' =>"Some Perameters Are Missing!"]);
			}else{
				$email = $this->post('email');
				$mobileNumber = $this->post('mobile');
					$date = date('Y-m-d H:i:s');

					$mobile_number = $this->post('mobile');
						$otp = $this->saveAndSendOTP($mobile_number);

						$users = $this->um->getCustomersData("users",['mobile' => $this->post('mobile')])->row_array();

						$updateOTP = $this->um->updateData("users",['otp' => $otp],['user_id'=> $users['user_id']]);
						$userotp = array('user_id' => $users['user_id'],'otp' => $otp);

						
				
					if($updateOTP){

						$this->response(['status'=> 200,'message' =>"Send OTP."]);
					}else{
						$this->response(['status'=> 409,'message' =>"Registration Failed,please try again"]);
					}
				
			}
		}else{
			$this->response(['status' => 401,'message' =>'Unauthorized.', 'result' => []]);
		}
	}


    // <-------------------------------- End Customers Data  ---------------------------------->

}