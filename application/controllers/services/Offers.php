<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH.'/libraries/REST_Controller.php';

class Offers extends REST_Controller {
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


	public function getOffers_get()
	{
		$method = $_SERVER['REQUEST_METHOD'];
		if($method != 'GET'){
			$this->response(['status' => 400,'message' =>'Bad request.']);
		} else {
			$check_auth_client = $this->um->check_auth_client();
			if($check_auth_client == true){
				

				$offerProducts = [];

				$getUser = $this->um->getUserDetailsById("users",['user_id' => $_GET['user_id']]);



				$ip = $getUser['ipaddress'];
				// $datasystems = $this->getLocation($ip);
				$datasystems = $this->file_get_contents($ip);
				// $datasystems = $this->file_get_contents('http://freegeoip.net/json/'.$ip);
				// echo "<pre>";
				// print_r($datasystems);
				// exit;


				$state = $datasystems['region'];
				$city = $datasystems['city'];
				$pincode = $datasystems['postal'];

				



        

        // $newPhrase = str_replace(('{user_id}', '12', $url), ('{offer_id}', '13', $url), ('{gaid}', '14', $url));

				// echo "<pre>";
				// print_r(str_replace($search, $replace, $url, $count));
				// exit;
				

				$offer_date = date('Y-m-d');

				// $offer = $this->um->getOffersData123("offers o",['o.status' => 'Y'],$offer_date,$state,$city,$pincode);
				$offer = $this->um->getOffersData123("offers o",['o.status' => 'Y'],$offer_date,$state,$city,$pincode);

				
				if($offer->num_rows() > 0){
					foreach ($offer->result() as $key => $msd) {
						$prod123 = $this->um->getOfferImages123("offers",['offer_id' => $msd->offer_id])->result_array();
						$tasks = $this->um->getOfferTasks("tasks",['offer_id' => $msd->offer_id])->result_array();

						$url = $msd->offer_payble_event;

				

						$search = array('{user_id}', '{offer_id}', '{gaid}');
						$replace = array($_GET['user_id'], $msd->offer_id, $getUser['gaid']);

						array_push($offerProducts, array('offer_id' => $msd->offer_id,'offer_title' => $msd->offer_title,'offer_tagline' => $msd->offer_side_title,'category' => $msd->category,'goal_name' => $msd->goal,'goalvalue' => $msd->value, 'offer_code' => $msd->offer_code, 'offer_desc' => $msd->offer_desc, 'offer_amount' => $msd->offer_amount,'start_date' => $msd->start_date,'end_date' => $msd->end_date, 'url' => str_replace($search, $replace, $url, $count), 'state' => $msd->state, 'city' => $msd->city, 'pincode' => $msd->pincode,'display_on_tasks' => $msd->display_on_tasks,'min_offers_avail_to_display' => $msd->min_offers_avail_to_display, 'tasks' => $tasks, 'images' => $prod123));
					}
				}
				$this->response($offerProducts);
			}else{
				$this->response(['status' => 401,'message' =>'Unauthorized.']);
			}
		}
	}

	public function getIpAddress()
    {
        $ipAddress = '';
        if (! empty($_SERVER['HTTP_CLIENT_IP']) && $this->isValidIpAddress($_SERVER['HTTP_CLIENT_IP'])) {
            // check for shared ISP IP
            $ipAddress = $_SERVER['HTTP_CLIENT_IP'];
        } else if (! empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            // check for IPs passing through proxy servers
            // check if multiple IP addresses are set and take the first one
            $ipAddressList = explode(',', $_SERVER['HTTP_X_FORWARDED_FOR']);
            foreach ($ipAddressList as $ip) {
                if ($this->isValidIpAddress($ip)) {
                    $ipAddress = $ip;
                    break;
                }
            }
        } else if (! empty($_SERVER['HTTP_X_FORWARDED']) && $this->isValidIpAddress($_SERVER['HTTP_X_FORWARDED'])) {
            $ipAddress = $_SERVER['HTTP_X_FORWARDED'];
        } else if (! empty($_SERVER['HTTP_X_CLUSTER_CLIENT_IP']) && $this->isValidIpAddress($_SERVER['HTTP_X_CLUSTER_CLIENT_IP'])) {
            $ipAddress = $_SERVER['HTTP_X_CLUSTER_CLIENT_IP'];
        } else if (! empty($_SERVER['HTTP_FORWARDED_FOR']) && $this->isValidIpAddress($_SERVER['HTTP_FORWARDED_FOR'])) {
            $ipAddress = $_SERVER['HTTP_FORWARDED_FOR'];
        } else if (! empty($_SERVER['HTTP_FORWARDED']) && $this->isValidIpAddress($_SERVER['HTTP_FORWARDED'])) {
            $ipAddress = $_SERVER['HTTP_FORWARDED'];
        } else if (! empty($_SERVER['REMOTE_ADDR']) && $this->isValidIpAddress($_SERVER['REMOTE_ADDR'])) {
            $ipAddress = $_SERVER['REMOTE_ADDR'];
        }
        return $ipAddress;
    }

    public function isValidIpAddress($ip)
    {
        if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4 | FILTER_FLAG_IPV6 | FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) === false) {
            return false;
        }
        return true;
    }

    public function getLocation($ip)
    {
        $ch = curl_init('http://ipinfo.io/json/' . $ip);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $json = curl_exec($ch);
        curl_close($ch);
        // Decode JSON response
        $ipWhoIsResponse = json_decode($json, true);
        // Country code output, field "country_code"
        return $ipWhoIsResponse;
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


	public function getupcomingOffers_get()
	{
		$method = $_SERVER['REQUEST_METHOD'];
		if($method != 'GET'){
			$this->response(['status' => 400,'message' =>'Bad request.']);
		} else {
			$check_auth_client = $this->um->check_auth_client();
			if($check_auth_client == true){
				

				$offerProducts = [];

				$offer_date = date('Y-m-d');

				$offer = $this->um->getOffersData456123455("offers o",['o.status' => 'Y'],$offer_date);

				$getUser = $this->um->getUserDetailsById("users",['user_id' => $_GET['user_id']]);



				$ip = $getUser['ipaddress'];
				// $datasystems = $this->getLocation($ip);
				$datasystems = $this->file_get_contents($ip);


				$state = $datasystems['region'];
				$city = $datasystems['city'];
				$pincode = $datasystems['postal'];

				
				if($offer->num_rows() > 0){
					foreach ($offer->result() as $key => $msd) {
						$prod123 = $this->um->getOfferImages123("offers",['offer_id' => $msd->offer_id])->result_array();
						$tasks = $this->um->getOfferTasks("tasks",['offer_id' => $msd->offer_id])->result_array();

						$url = $msd->offer_payble_event;

				

						$search = array('{user_id}', '{offer_id}', '{gaid}');
						$replace = array($_GET['user_id'], $msd->offer_id, $getUser['gaid']);
						array_push($offerProducts, array('offer_id' => $msd->offer_id,'offer_title' => $msd->offer_title, 'offer_code' => $msd->offer_code, 'offer_desc' => $msd->offer_desc, 'offer_amount' => $msd->offer_amount,'start_date' => $msd->start_date,'end_date' => $msd->end_date, 'url' => str_replace($search, $replace, $url, $count),'state' => $msd->state, 'city' => $msd->city, 'pincode' => $msd->pincode,'display_on_tasks' => $msd->display_on_tasks,'min_offers_avail_to_display' => $msd->min_offers_avail_to_display, 'tasks' => $tasks,'images' => $prod123));
					}
				}
				$this->response($offerProducts);
			}else{
				$this->response(['status' => 401,'message' =>'Unauthorized.']);
			}
		}
	}


	public function getMyOffer_post()
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

			$offerProducts = [];

				$offer = $this->um->getMyLogOfferDetails("offer_log l",$whr);

				
				if($offer->num_rows() > 0){
					foreach ($offer->result() as $key => $msd) {
						$prod123 = $this->um->getOfferImages123("offers",['offer_id' => $msd->offer_id])->result_array();
						$tasks = $this->um->getOfferTasks("tasks",['offer_id' => $msd->offer_id])->result_array();
						array_push($offerProducts, array('offer_id' => $msd->offer_id,'offer_title' => $msd->offer_title,'offer_tagline' => $msd->offer_side_title,'offer_button_title' => $msd->offer_button_title,'category' => $msd->category,'goal_name' => $msd->goal,'goalvalue' => $msd->value, 'offer_code' => $msd->offer_code, 'offer_desc' => $msd->offer_desc, 'offer_amount' => $msd->offer_amount,'start_date' => $msd->start_date,'end_date' => $msd->end_date, 'url' => $msd->offer_payble_event,'state' => $msd->state, 'city' => $msd->city, 'pincode' => $msd->pincode,'display_on_tasks' => $msd->display_on_tasks,'min_offers_avail_to_display' => $msd->min_offers_avail_to_display,'amount' => $msd->amount,'task_status' => $msd->task_status, 'tasks' => $tasks, 'images' => $prod123));
					}
				}
				// $offers = $this->um->getOffersData("offers",$whr)->row_array();
				if($offer){
					$this->response($offerProducts);
				}else{
					$this->response(['status'=> 404,'message' =>"Failed,please try again",'result'=> null]);
				}
			}
		}else{
			$this->response(['status' => 401,'message' =>'Unauthorized.']);
		}
	  
	}



   
   public function getBanner_get()
   {
   	$method =$_SERVER['REQUEST_METHOD'];
   	if($method != 'GET'){
   		$this->response(['status' =>400,'message' => 'Bad request']);
   	}else{
   		$check_auth_client=$this->um->check_auth_client();
   		if($check_auth_client ==true){
   			$type = $_GET['type'];
   			$banner =$this->um->getBanners("banner",['type' => $type])->result_array();
   			$this->response(['status' =>200 ,  'message' =>"Banner Details" ,'banner'=>$banner]);
   		}else{
   			$this->response(['status' =>401, 'message'=>'Unauthorized']);
   		}
   	}
   }


	public function getOfferDetailsById_post()
	{
		$method = $_SERVER['REQUEST_METHOD'];
		$res = $this->mainFunction($method);
		if($res == 1){
			if(!$this->post('offer_id') && !$this->post('user_id')){
				$this->response(['status'=> 405,'message' =>"Some Perameters Are Missing!"]);
			}else{
				$whr = [
					'o.offer_id' => $this->post('offer_id'),
					'o.status' => 'Y'
			];

			$offerProducts = [];

				$offer = $this->um->getOffers("offers o",$whr)->row_array();

				if($this->post('user_id') == '') {
					$ip = 0;
				$datasystems = $this->file_get_contents($ip); 
				$search = '';
						$replace = '';
						$url = $offer['offer_payble_event'];

				}else{
					$getUser = $this->um->getUserDetailsById("users",['user_id' => $this->post('user_id')]);
					$ip = $getUser['ipaddress'];
				$datasystems = $this->file_get_contents($ip);
				$state = $datasystems['region'];
				$city = $datasystems['city'];
				$pincode = $datasystems['postal'];

				$url = $offer['offer_payble_event'];

				

						$search = array('{user_id}', '{offer_id}', '{gaid}');
						$replace = array($this->post('user_id'), $offer['offer_id'], $getUser['gaid']);
				}

				



				


				

				
				// if($offer->num_rows() > 0){
				// 	foreach ($offer->result() as $key => $msd) {
						$prod123 = $this->um->getOfferImages123("offers",['offer_id' => $offer['offer_id']])->result_array();
						$tasks = $this->um->getOfferTasks("tasks",['offer_id' => $offer['offer_id']])->result_array();

						$offerlogs = $this->um->getOfferLogsCount("offer_log",['offer_id' => $offer['offer_id']])->result_array();
						array_push($offerProducts, array('offer_id' => $offer['offer_id'],'offer_title' => $offer['offer_title'],'offer_title' => $offer['offer_title'],'offer_tagline' => $offer['offer_side_title'],'offer_button_title' => $offer['offer_button_title'],'category' => $offer['category'],'goal_name' => $offer['goal'],'goalvalue' => $offer['value'], 'offer_code' => $offer['offer_code'], 'offer_desc' => $offer['offer_desc'], 'offer_amount' => $offer['offer_amount'], 'url' => str_replace($search, $replace, $url, $count),'state' => $offer['state'], 'city' => $offer['city'], 'pincode' => $offer['pincode'],'display_on_tasks' => $offer['display_on_tasks'],'min_offers_avail_to_display' => $offer['min_offers_avail_to_display'],'availedusers' => count($offerlogs), 'tasks' => $tasks, 'images' => $prod123));
				// 	}
				// }
				// $offers = $this->um->getOffersData("offers",$whr)->row_array();
				if($offer){
					$this->response($offerProducts);
				}else{
					$this->response(['status'=> 404,'message' =>"Failed,please try again",'result'=> null]);
				}
			}
		}else{
			$this->response(['status' => 401,'message' =>'Unauthorized.']);
		}
	  
	}



	public function offerLoginsert_post()
	{
		$method = $_SERVER['REQUEST_METHOD'];
 		$res = $this->mainFunction($method);

     	if($res == 1){
			if(!$this->post('offer_id') && !$this->post('user_id')){
				$this->response(['status'=> 404,'message' =>"Some Perameters Are Missing!"]);
			}else{
				$getUser = $this->um->getUserDetailsById("users",['user_id' => $this->post('user_id')]);
				$userData = [
					        'offer_id' => $this->post('offer_id'),
					        'user_id' => $this->post('user_id'),
					        'task_status' => $this->post('task_status'),
					        'amount' => $this->post('amount'),
					        'goal_value' => $this->post('goal_value'),
					        'gaid' => $getUser['gaid']
				        ];
				$updateId = $this->um->insertData("offer_log", $userData);
				if($updateId > 0){

					$transactiontype = [
								'transaction_type' => 'Credited',
								'user_id' => $this->post('user_id'),
								'transaction_from' => 'Offer',
								'transaction_amount' => $this->post('amount'),
								'transaction_status' => 'Success',
								'transaction_at' => $this->date,
								'order_id' => uniqid()
							];

							$orderInserted = $this->um->insertData("transactions",$transactiontype);

					$this->response(['status'=> 200,'message' =>"Offer Log Inserted Successfully."]);
				}else{
					$this->response(['status'=> 404,'message' =>"Failed, please try again."]);
				}
			}
		}else{
			$this->response(['status' => 401,'message' =>'Unauthorized.']);
		}
	}

	public function getMyOfferTaskscount_post()
	{
		$method = $_SERVER['REQUEST_METHOD'];
		$res = $this->mainFunction($method);
		if($res == 1){
			if(!$this->post('user_id') && !$this->post('offer_id')){
				$this->response(['status'=> 405,'message' =>"Some Perameters Are Missing!"]);
			}else{
				$whr = [
					'l.offer_id' => $this->post('offer_id'),
					'l.user_id' => $this->post('user_id')
			];

			$offerProducts = [];

				$offer = $this->um->getMyLogOfferDetails("offer_log l",$whr)->result_array();

				// $offers = $this->um->getOffersData("offers",$whr)->row_array();
				if($offer){
					$this->response(count($offer));
				}else{
					$this->response(['status'=> 404,'message' =>"Failed,please try again",'result'=> null]);
				}
			}
		}else{
			$this->response(['status' => 401,'message' =>'Unauthorized.']);
		}
	  
	}


	public function postbackApi_get()
	{
		$method = $_SERVER['REQUEST_METHOD'];
		if($method != 'GET'){
			$this->response(['status' => 400,'message' =>'Bad request.']);
		} else {
			// $check_auth_client = $this->um->check_auth_client();
			// if($check_auth_client == true){

				$user_id = $_GET['user_id'];
				$offer_id = $_GET['offer_id'];
				$gaid = $_GET['gaid'];
				$goal_value = $_GET['goal_value'];

				$logsearch = $this->um->getOfferslogsearch("offer_log",['user_id' => $user_id, 'offer_id' => $offer_id, 'goal_value' => $goal_value])->result_array();

				$goals = $this->um->getGoals("goals",['value' => $goal_value])->row_array();

				// echo "<pre>";
				// print_r($goals);
				// exit;
				

				if(count($logsearch) == 0) {

					

					if($goals == '') {

						$this->response(['status'=> 202,'message' =>"No Goal Value",'result'=> null]);

					}else {
                       $offerdata = $this->um->getOffers("offers o",['o.offer_id' => $offer_id, 'o.goal_id' => $goals['goal_id']])->row_array();

                       if($offerdata == '') {

                       	$this->response(['status'=> 201,'message' =>"No Offers Available",'result'=> null]);

                       }else {

                       	$userData = [
					        'offer_id' => $_GET['offer_id'],
					        'user_id' => $_GET['user_id'],
					        'task_status' => $_GET['goal_value'],
					        'amount' => $offerdata['offer_amount'],
					        'goal_value' => $_GET['goal_value'],
					        'gaid' => $_GET['gaid']
				        ];
				$updateId = $this->um->insertData("offer_log", $userData);


				$transactiontype = [
								'transaction_type' => 'Credited',
								'user_id' => $_GET['user_id'],
								'transaction_from' => 'Offer',
								'transaction_amount' => $offerdata['offer_amount'],
								'transaction_status' => 'Success',
								'transaction_at' => $this->date,
								'order_id' => uniqid()
							];

							$orderInserted = $this->um->insertData("transactions",$transactiontype);



					}

					$this->response(['status'=> 200,'message' =>"Offer Log Inserted Successfully."]);

                       }



                       

				}else {

					$this->response(['status'=> 404,'message' =>"Already Accepted offer",'result'=> null]);

				}
				$this->response($offerProducts);
			// }else{
			// 	$this->response(['status' => 401,'message' =>'Unauthorized.']);
			// }
		}
	}





}