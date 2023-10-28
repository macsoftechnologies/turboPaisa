<?php 

class UserModel extends CI_Model
{
	public function __construct()
	{
        parent::__construct();
        /*header('Access-Control-Allow-Origin: *');
		header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");*/
		header('Access-Control-Allow-Origin: *');
		header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
		header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
    }

    var $auth_key       = AUTH_KEY;

    public function check_auth_client(){
        $auth_key  = $this->input->get_request_header('Auth-Key', TRUE);

        if($auth_key == $this->auth_key){
            return true;
        } else {
        	return false;
        }
    }

	public function insertData($tablename,$data)
	{
		$this->db->insert($tablename,$data);
		return $this->db->insert_id();
	}

	public function updateData($tablename,$set,$whr)
	{
		$this->db->set($set)->where($whr)->update($tablename);
		return true;
	}

	public function updatepass($tableName,$set,$upWhr)
    {
        $this->db->set($set)->where($upWhr)->update($tableName);
    }
	
	public function deleteData($tablename,$data)
	{
		$this->db->where($data)->delete($tablename);
		return true;
	}

	public function checkAdminLogin($tablename,$username,$pwd)
	{
		$result = array();
		$this->db->select('admin_id, admin_name, email, mobile_number, role_id, photo, address, status');
		$this->db->from($tablename);
		$this->db->where('email',$username);
		$this->db->or_where('mobile_number',$username);
		$this->db->where('password',$pwd);
		$result = $this->db->get()->row_array();
		return $result;
	}

	public function getStatus($tableName,$whr)
	{
		$this->db->select('status_id, status_name');
		$this->db->from($tableName);
		$this->db->where($whr);
		$result = $this->db->get();
		return $result;
	}

	public function check_userlogin($emailmobile,$userpassword)
	{
		$result = array();
		$this->db->select('admin_id, admin_name, email, mobile_number, role_id, photo, address');
		$this->db->from('tbl_admin');
		$this->db->where("(email = '$emailmobile' OR mobile_number = '$emailmobile')");
		$this->db->where('password',$userpassword);
		$this->db->where('status',1);
		$result = $this->db->get()->row_array();
		return $result;
	}

	public function check_usersdatalogin($email,$userpassword)
	{
		$result = array();
		$this->db->select('*');
		$this->db->from('users');
		// $this->db->where("(device_id = '$device_id')");
		$this->db->where("(email = '$email' OR mobile = '$email')");
		$this->db->where('password',$userpassword);
		$this->db->where('status','Y');
		// $this->db->get();
		// print_r($this->db->last_query());
		// exit;
		$result = $this->db->get()->row_array();
		return $result;
	}


	public function adminDetails($tableName,$whr)
	{
		$this->db->select('admin_id, admin_name, email, mobile_number, password, role_id, photo, address, status');
		$this->db->from($tableName);
		$this->db->where($whr);
		$result = $this->db->get()->row_array();
		return $result;
	}

	public function getCategories($tableName,$whr)
	{
		$this->db->select('*');
		$this->db->from($tableName);
		$this->db->where($whr);
		$result = $this->db->get();
		return $result;
	}


	public function getStocks($tableName,$whr)
	{
		$this->db->select('*');
		$this->db->from($tableName);
		$this->db->where($whr);
		$result = $this->db->get();
		return $result;
	}

	public function getSubCategories($tableName,$whr)
	{
		$this->db->select('s.sub_cat_id, s.category_id, s.sub_cat_name, s.sub_cat_image, s.subcat_description, c.category_name, c.category_image');
		$this->db->from($tableName);
		$this->db->where($whr);
        $this->db->join('categories c','s.category_id = c.category_id', 'LEFT');
		$result = $this->db->get();
		return $result;
	}

	public function checkUserExistOrNot($tableName,$mobileNumber)
	{
		
		$res = 0;
		$this->db->select('user_id');
		$this->db->from($tableName);
		$this->db->where('mobile',$mobileNumber);
		// $this->db->or_where('email',$email);
		$result = $this->db->get()->row_array();

		if(!empty($result))
		{
			$res = $result['user_id'];
		}
		return $res;
	}

	public function getCustomersData($tableName,$whr)
	{
		$this->db->select('*');
		$this->db->from($tableName);
		$this->db->where($whr);
		$this->db->order_by('user_id','desc');
		$result = $this->db->get();
		return $result;
	}


	public function getOffersData($tableName,$whr)
	{
		$this->db->select('*');
		$this->db->from($tableName);
		$this->db->where($whr);
		$result = $this->db->get();
		return $result;
	}


	public function getOffersData123($tableName,$whr,$offer_date,$state,$city,$pincode)
	{
		$this->db->select('o.*, c.category, g.goal, g.value');
		$this->db->from($tableName);
		$this->db->where($whr);
		$this->db->where('find_in_set("'.$state.'", state) <> 0');
		$this->db->or_where('find_in_set("'.$city.'", city) <> 0');
		$this->db->or_where('find_in_set("'.$pincode.'", pincode) <> 0');
		$this->db->join('categories c','o.category_id = c.category_id','LEFT');
		$this->db->join('goals g','o.goal_id = g.goal_id','LEFT');
		if($offer_date != ""){
            $this->db->where("o.start_date <= '$offer_date'");
        }
        // $this->db->order_by('o.priority', 'asc');
        // $this->db->get();
		// print_r($this->db->last_query());
		// exit;
		$result = $this->db->get();
		return $result;
	}


	public function getOffersData456($tableName,$whr,$offer_date)
	{
		$this->db->select('o.*, c.category, g.goal, g.value');
		$this->db->from($tableName);
		$this->db->where($whr);
		$this->db->join('categories c','o.category_id = c.category_id','LEFT');
		$this->db->join('goals g','o.goal_id = g.goal_id','LEFT');
		if($offer_date != ""){
            $this->db->where("o.start_date >= '$offer_date'");
        }
		$result = $this->db->get();
		return $result;
	}

	public function getOffersData456123455($tableName,$whr,$offer_date)
	{
		$this->db->select('o.*, c.category, g.goal, g.value');
		$this->db->from($tableName);
		$this->db->where($whr);
		$this->db->join('categories c','o.category_id = c.category_id','LEFT');
		$this->db->join('goals g','o.goal_id = g.goal_id','LEFT');
		if($offer_date != ""){
            $this->db->where("o.start_date < '$offer_date'");
        }
		$result = $this->db->get();
		return $result;
	}





	public function getRates($tableName,$whr)
	{
		$this->db->select('*');
		$this->db->from($tableName);
		$this->db->where($whr);
		$result = $this->db->get();
		return $result;
	}

	public function getProductDjnilujoetails($tableName,$whr)
	{
		$this->db->select('p.product_id, p.weight, p.name, p.type, p.category_id, c.category_name, p.style_code, p.description, p.price, p.discount, p.front_image, p.measurement, p.stone, p.weight, p.net_weight, p.clousure, p.weight, p.stone_color, p.gst, p.status, p.sub_cat_id,s.sub_cat_name, p.price_type, p.length, p.width, p.size, p.stock, p.diamond_color, p.diamond_clarity, p.diamond_carat, p.diamond_pcs');
		$this->db->from($tableName);
		$this->db->where($whr);
		$this->db->join('categories c','p.category_id = c.category_id','INNER');
		$this->db->join('sucategories s','p.sub_cat_id = s.sub_cat_id','INNER');
		$this->db->order_by('p.product_id', 'desc');
		$result = $this->db->get();
		return $result;
	}

	public function getProductDetails($tableName,$whr)
	{
		$this->db->select('*');
		$this->db->from($tableName);
		$this->db->where($whr);
		$this->db->order_by('product_id', 'desc');
		$result = $this->db->get();
		return $result;
	}

	public function getProductImages($tableName,$whr)
	{
		$this->db->select('*');
		$this->db->from($tableName);
		$this->db->where($whr);
		$result = $this->db->get();
		return $result;
	}

	public function getProductStones($tableName,$whr)
	{
		$this->db->select('*');
		$this->db->from($tableName);
		$this->db->where($whr);
		$result = $this->db->get();
		return $result;
	}

	public function getCartItems($tableName,$whr)
	{
		$this->db->select('*');
		$this->db->from($tableName);
		$this->db->where($whr);
		$result = $this->db->get();
		return $result;
	}


	public function getCartProductsItems($tableName,$whr)
	{
		$this->db->select('c.cart_id, c.product_id, c.user_id, c.order_status, c.quantity, c.total_amount, c.discount, c.status, p.name, p.category_id, p.sub_cat_id, p.style_code, p.description, p.price, p.discount, p.front_image, p.clousure, p.weight, p.type, p.price_type, p.net_weight, cc.category_name,s.sub_cat_name,c.coupon_name,p.stock');
		$this->db->from($tableName);
		$this->db->where($whr);
		$this->db->join('tbl_product p','c.product_id = p.product_id','LEFT');
		$this->db->join('categories cc','p.category_id = cc.category_id','LEFT');
		$this->db->join('sucategories s','p.sub_cat_id = s.sub_cat_id','LEFT');
		// $this->db->join('coupons cp','c.coupon_name = cp.coupon_name','LEFT');
		$result = $this->db->get();
		return $result;
	}

	public function getMyorders($tableName,$whr)
	{
		$this->db->select('order_id, user_id, grand_total, order_txn, tracking_id, bank_ref, delivery_date, order_status, status, created_at, updated_at, first_name, last_name, email, address, city, state, phone_number, zipcode');
		$this->db->from($tableName);
		$this->db->where($whr);
		// $this->db->order_by('order_id','desc');
		$this->db->order_by('order_id', 'desc');
		$result = $this->db->get();
		return $result;
	}

	public function getStoneTypes($tableName,$whr)
	{
		$this->db->select('stone_id, stone_name,  weight, price, total, status, product_id');
		$this->db->from($tableName);
		$this->db->where($whr);
		$result = $this->db->get();
		return $result;
	}

	public function getbackgroundeImagesProductTypes($tableName,$whr)
	{
		$this->db->select('image_id, product_id, image, status, created_at');
		$this->db->from($tableName);
		$this->db->where($whr);
		$result = $this->db->get();
		return $result;
	}


	public function getorderStatus($tableName,$whr)
	{
		$this->db->select('order_status_id, status_name, status');
		$this->db->from($tableName);
		$this->db->where($whr);
		$result = $this->db->get();
		return $result;
	}

	public function getWhistListItems($tableName,$whr)
	{
		$this->db->select('*');
		$this->db->from($tableName);
		$this->db->where($whr);
		$result = $this->db->get();
		return $result;
	}


	public function getWhistlistItemsData($tableName,$whr)
	{
		$this->db->select('w.whistlist_id, w.product_id, w.user_id,  p.name, p.category_id, p.sub_cat_id, p.style_code, p.description, p.price, p.discount, p.front_image, p.clousure, p.weight, p.type, p.price_type, p.net_weight, cc.category_name,s.sub_cat_name,');
		$this->db->from($tableName);
		$this->db->where($whr);
		$this->db->join('tbl_product p','w.product_id = p.product_id','LEFT');
		$this->db->join('categories cc','p.category_id = cc.category_id','INNER');
		$this->db->join('sucategories s','p.sub_cat_id = s.sub_cat_id','INNER');
		$result = $this->db->get();
		return $result;
	}


	public function getPaymentScreenDate($tableName,$from, $to,$order_status)
	{
		$this->db->select('*');
		$this->db->from($tableName);
		$this->db->where("order_status = '$order_status'");
		if($from != "" && $to != ""){
			$this->db->where("created_at >= '$from' and created_at <= '$to'");
		}
		$result = $this->db->get();
		return $result;
	}


	public function getOffers($tableName,$whr)
	{
		$this->db->select('o.*, c.category, g.goal, g.value');
		$this->db->from($tableName);
		$this->db->where($whr);
		$this->db->join('categories c','o.category_id = c.category_id','LEFT');
		$this->db->join('goals g','o.goal_id = g.goal_id','LEFT');
		$result = $this->db->get();
		return $result;
	}


	public function getCoupons($tableName,$whr)
	{
		$this->db->select('*');
		$this->db->from($tableName);
		$this->db->where($whr);
		$result = $this->db->get();
		return $result;
	}

	public function getBanners($tableName,$whr)
	{
		$this->db->select('*');
		$this->db->from($tableName);
		$this->db->where($whr);
		$this->db->order_by('priority', 'asc');
		$result = $this->db->get();
		return $result;
	}


	public function checkOldPass($tableName,$whr)
    {
    	// $res = 0;
        // $this->db->select('user_id,password');
		// $this->db->from($tableName);
		// $this->db->where($whr);
		// $result = $this->db->get()->row_array();
		// if($result['user_id'] != ""){
		// 	$res = $result['user_id'];
		// }
		// return $res;
		$this->db->select('user_id,password');
		$this->db->from($tableName);
		$this->db->where($whr);
		$result = $this->db->get()->row_array();
		return $result;
    }

    public function getFaqs($tableName,$whr)
	{
		$this->db->select('*');
		$this->db->from($tableName);
		$this->db->where($whr);
		$result = $this->db->get();
		return $result;
	}


	public function getReviews($tableName,$whr)
	{
		$this->db->select('*');
		$this->db->from($tableName);
		$this->db->where($whr);
		$result = $this->db->get();
		return $result;
	}

	public function checkEmailexistOrNot($tableName,$whr)
	{
		$res = 0;
		$this->db->select('user_id');
		$this->db->from($tableName);
		$this->db->where($whr);
		$result = $this->db->get()->row_array();
		if($result['user_id'] != ""){
			$res = $result['user_id'];
		}
		return $res;
	}

	public function getSuibscribedusersDetails($tableName,$whr)
	{
		$this->db->select('*');
		$this->db->from($tableName);
		$this->db->where($whr);
		$this->db->order_by('subscribed_id', 'desc');
		$result = $this->db->get();
		return $result;
	}


	public function getOrdersDetails($tableName,$whr)
	{
		$this->db->select('*');
		$this->db->from($tableName);
		$this->db->where($whr);
		$result = $this->db->get();
		return $result;
	}

	public function getFaqsDetails($tableName,$whr)
	{
		$this->db->select('f.faq_id, f.name, f.mobile_number, f.user_id, f.question, f.status, u.firstname, u.lastname, u.email, u.mobilenumber');
		$this->db->from($tableName);
		$this->db->where($whr);
		$this->db->join('users u','f.user_id = u.user_id','INNER');
		$this->db->order_by('faq_id', 'desc');
		$result = $this->db->get();
		return $result;
	}

	public function getreviewsDetails($tableName,$whr)
	{
		$this->db->select('r.review_id, r.name, r.rating, r.summary, r.review, r.user_id, u.firstname, u.lastname, u.email, u.mobilenumber, r.created_at');
		$this->db->from($tableName);
		$this->db->where($whr);
		$this->db->join('users u','r.user_id = u.user_id','INNER');
		$this->db->order_by('review_id', 'desc');
		$result = $this->db->get();
		return $result;
	}

	// public function getBanners($tableName,$whr)
	// {
	// 	$this->db->select('*');
	// 	$this->db->from($tableName);
	// 	$this->db->where($whr);
	// 	$result = $this->db->get();
	// 	return $result;
	// }

	public function getQuariesDetails($tableName,$whr)
	{
		$this->db->select('*');
		$this->db->from($tableName);
		$this->db->where($whr);
		$this->db->order_by('query_id', 'desc');
		$result = $this->db->get();
		return $result;
	}


	public function getminiBanners($tableName,$whr)
	{
		$this->db->select('*');
		$this->db->from($tableName);
		$this->db->where($whr);
		$result = $this->db->get();
		return $result;
	}


	public function getuserDetails123($tableName,$whr)
	{
		$this->db->select('*');
		$this->db->from($tableName);
		$this->db->where($whr);
		$result = $this->db->get();
		return $result;
	}


	public function getProductDjnilujoetailsByNAmedata($tableName,$whr)
	{
		$this->db->select('p.product_id, p.weight, p.name, p.type, p.category_id, c.category_name, p.style_code, p.description, p.price, p.discount, p.front_image, p.measurement, p.stone, p.weight, p.net_weight, p.clousure, p.weight, p.stone_color, p.gst, p.status, p.sub_cat_id,s.sub_cat_name, p.price_type, p.length, p.width, p.size, p.stock');
		$this->db->from($tableName);
		$this->db->like($whr);
		$this->db->join('categories c','p.category_id = c.category_id','INNER');
		$this->db->join('sucategories s','p.sub_cat_id = s.sub_cat_id','INNER');
		$this->db->order_by('p.product_id', 'desc');
		$result = $this->db->get();
		return $result;
	}


	// public function gedeliverdOrders_dup($tableName,$whr, $from, $to)
 //    {
 //    	$this->db->select('p.product_id, p.weight, p.name, p.type, p.category_id, c.category_name, p.style_code, p.description, p.price, p.discount, p.front_image, p.measurement, p.stone, p.weight, p.net_weight, p.clousure, p.weight, p.stone_color, p.gst, p.status, p.sub_cat_id,s.sub_cat_name, p.price_type, p.length, p.width');
	// 	$this->db->from($tableName);
	// 	$this->db->join('categories c','p.category_id = c.category_id','INNER');
	// 	$this->db->join('sucategories s','p.sub_cat_id = s.sub_cat_id','INNER');
	// 	$this->db->where($whr);
	// 	// if($from != "" && $to != ""){
	// 	// 	$this->db->where("uo.created_at >= '$from' and uo.created_at <= '$to'");
	// 	// }
	// 	$this->db->order_by('p.product_id', 'desc');
	// 	$result = $this->db->get();
	// 	return $result;
 //    }

 //    public function getProductDjnilujoetails($tableName,$whr)
	// {
	// 	$this->db->select('p.product_id, p.weight, p.name, p.type, p.category_id, c.category_name, p.style_code, p.description, p.price, p.discount, p.front_image, p.measurement, p.stone, p.weight, p.net_weight, p.clousure, p.weight, p.stone_color, p.gst, p.status, p.sub_cat_id,s.sub_cat_name, p.price_type, p.length, p.width');
	// 	$this->db->from($tableName);
	// 	$this->db->where($whr);
	// 	$this->db->join('categories c','p.category_id = c.category_id','INNER');
	// 	$this->db->join('sucategories s','p.sub_cat_id = s.sub_cat_id','INNER');
	// 	$this->db->order_by('p.product_id', 'desc');
	// 	$result = $this->db->get();
	// 	return $result;
	// }


	public function getRecord($rowno,$rowperpage) {			
		$this->db->select('p.product_id, p.weight, p.name, p.type, p.category_id, c.category_name, p.style_code, p.description, p.price, p.discount, p.front_image, p.measurement, p.stone, p.weight, p.net_weight, p.clousure, p.weight, p.stone_color, p.gst, p.status, p.sub_cat_id,s.sub_cat_name, p.price_type, p.length, p.width, p.size, p.stock, p.new_arrival');
		$this->db->from('tbl_product p');
		$this->db->join('categories c','p.category_id = c.category_id','INNER');
		$this->db->join('sucategories s','p.sub_cat_id = s.sub_cat_id','INNER');
		$this->db->order_by('p.product_id', 'desc');
		$this->db->where_not_in('p.status',0);
        $this->db->limit($rowperpage, $rowno);  
		$query = $this->db->get();       	
		return $query->result_array();
	}

	public function getRecordCount() {
    	$this->db->select('count(*) as allcount');
      	$this->db->from('tbl_product');
      	$this->db->where_not_in('status',0);
      	$query = $this->db->get();
      	$result = $query->result_array();      
      	return $result[0]['allcount'];
    }


    public function getRecordCount123() {
    	$this->db->select('count(*) as allcount');
      	$this->db->from('users');
      	// $this->db->where_in('status',1);
      	$this->db->order_by('user_id','desc');
      	$query = $this->db->get();
      	$result = $query->result_array();      
      	return $result[0]['allcount'];
    }


    public function getRecord123($rowno,$rowperpage) {			
		$this->db->select('*');
		$this->db->from('users');
		$this->db->order_by('user_id','desc');
		$this->db->where_in('status',1);
        $this->db->limit($rowperpage, $rowno);  
		$query = $this->db->get();       	
		return $query->result_array();
	}


	public function getAllUSersDetailsData($tableName,$whr)
	{
		$this->db->select('*');
		$this->db->from($tableName);
		$this->db->where($whr);
		$result = $this->db->get();
		return $result;
	}

	public function getOfferImages($tableName,$whr)
	{
		$this->db->select('offer_id, image');
		$this->db->from($tableName);
		$this->db->where($whr);
		$result = $this->db->get();
		return $result;
	}


	public function getOfferImages123($tableName,$whr)
	{
		$this->db->select('offer_id, offer_banner_image as image');
		$this->db->from($tableName);
		$this->db->where($whr);
		$result = $this->db->get();
		return $result;
	}


	public function getMyLogOfferDetails($tableName,$whr)
	{
		$this->db->select('l.user_id, l.amount, l.task_status, l.offer_id, o.offer_title, o.offer_code, o.offer_desc, o.offer_amount, o.offer_payble_event, o.start_date, o.end_date, c.category, g.goal, g.value, o.offer_side_title, o.offer_button_title, o.state, o.city, o.pincode, o.display_on_tasks, o.min_offers_avail_to_display');
		$this->db->from($tableName);
		$this->db->where($whr);
		$this->db->join('offers o','l.offer_id = o.offer_id','INNER');
		$this->db->join('categories c','o.category_id = c.category_id','LEFT');
		$this->db->join('goals g','o.goal_id = g.goal_id','LEFT');
		$result = $this->db->get();
		return $result;
	}


	public function getScartchcard($tableName,$whr)
	{
		$this->db->select('*');
		$this->db->from($tableName);
		$this->db->where($whr);
		$this->db->where_not_in('scratch_color','Green');
		$result = $this->db->get();
		return $result;
	}

	public function getGreenScartchcard($tableName,$whr)
	{
		$this->db->select('*');
		$this->db->from($tableName);
		$this->db->where($whr);
		$this->db->where_in('scratch_color','Green');
		$result = $this->db->get();
		return $result;
	}


	public function getSpin($tableName,$whr)
	{
		$this->db->select('*');
		$this->db->from($tableName);
		$this->db->where($whr);
		$result = $this->db->get();
		return $result;
	}

	public function getSpinDetails($tableName,$whr)
	{
		$this->db->select('s.*, o.offer_title, o.state, o.city, o.pincode');
		$this->db->from($tableName);
		$this->db->where($whr);
		$this->db->join('offers o','s.offer_id = o.offer_id','LEFT');
		$result = $this->db->get();
		return $result;
	}


	public function getScratchcardData123($tableName,$whr,$scratchcard_date)
	{
		$this->db->select('*');
		$this->db->from($tableName);
		$this->db->where($whr);
		if($scratchcard_date != ""){
            $this->db->where("start_date <= '$scratchcard_date'");
        }
		$result = $this->db->get();
		return $result;
	}

	public function getScartchcardDetailsinData($tableName,$whr)
	{
		$this->db->select('s.*,o.offer_title, o.state, o.city, o.pincode');
		$this->db->from($tableName);
		$this->db->where($whr);
		$this->db->join('offers o','s.offer_id = o.offer_id','LEFT');
		// $this->db->get();
		// print_r($this->db->last_query());
		// exit;
		$result = $this->db->get();
		return $result;
	}

	

	public function getScratchcardData123654($tableName,$whr,$scratchcard_date)
	{
		$this->db->select('s.*, o.offer_title, o.state, o.city, o.pincode');
		$this->db->from($tableName);
		$this->db->where($whr);
		$this->db->join('offers o','s.offer_id = o.offer_id','INNER');
		if($scratchcard_date != ""){
            $this->db->where("s.start_date <= '$scratchcard_date'");
        }
		$result = $this->db->get();
		return $result;
	}

	public function getScratchcardData1236008y9798($tableName,$whr)
	{
		$this->db->select('s.*, o.offer_title, o.state, o.city, o.pincode');
		$this->db->from($tableName);
		$this->db->where($whr);
		$this->db->join('offers o','s.offer_id = o.offer_id','LEFT');
		$result = $this->db->get();
		return $result;
	}

	public function getSpincardDetails($tableName,$whr,$spindate)
	{
		$this->db->select('s.*, o.offer_title, o.state, o.city, o.pincode');
		$this->db->from($tableName);
		$this->db->where($whr);
		$this->db->join('offers o','s.offer_id = o.offer_id','LEFT');
		if($spindate != ""){
            $this->db->where("s.start_date <= '$spindate'");
        }
		$result = $this->db->get();
		return $result;
	}


	public function getMyScratchcardDetails($tableName,$whr)
	{
		$this->db->select('u.*, s.scratch_title, s.scratch_amount, s.scratch_desc, s.scratch_code, s.scratch_image, s.scratch_url, s.scratch_color, s.start_date, s.type, s.end_date');
		$this->db->from($tableName);
		$this->db->where($whr);
		$this->db->join('scratchcard s','u.scratch_id = s.scratch_id','INNER');
		$result = $this->db->get();
		return $result;
	}

	public function getMySpincardDetails($tableName,$whr)
	{
		$this->db->select('u.*, s.spin_title, s.spin_amount, s.spin_desc, s.spin_code, s.spin_image, s.spin_url, s.start_date, s.end_date, s.spin_add_image');
		$this->db->from($tableName);
		$this->db->where($whr);
		$this->db->join('spin s','u.spin_id = s.spin_id','INNER');
		$result = $this->db->get();
		return $result;
	}

	public function getCategories123($tableName,$whr)
	{
		$this->db->select('*');
		$this->db->from($tableName);
		$this->db->where($whr);
		$result = $this->db->get();
		return $result;
	}

	public function getGoals($tableName,$whr)
	{
		$this->db->select('*');
		$this->db->from($tableName);
		$this->db->where($whr);
		$result = $this->db->get();
		return $result;
	}


	public function getOfferLogsCount($tableName,$whr)
	{
		$this->db->select('*');
		$this->db->from($tableName);
		$this->db->where($whr);
		$this->db->distinct();
        $this->db->group_by('user_id');
		$result = $this->db->get();
		return $result;
	}

	public function getOfferTasks($tableName,$whr)
	{
		$this->db->select('*');
		$this->db->from($tableName);
		$this->db->where($whr);
		$result = $this->db->get();
		return $result;
	}

	public function getScratchcardsLists($tableName,$whr)
	{
		$this->db->select('*');
		$this->db->from($tableName);
		$this->db->where_not_in($whr);
		$result = $this->db->get();
		return $result;
	}


	public function getMyScratchcardDetails123456($tableName,$whrs)
	{
		$this->db->select('*');
		$this->db->from($tableName);
		$this->db->where($whrs);
		// $this->db->get();
		// print_r($this->db->last_query());
		// exit;
		$result = $this->db->get();
		return $result;
	}

	public function getreferralsettings($tableName,$whr)
	{
		$this->db->select('*');
		$this->db->from($tableName);
		$this->db->where($whr);
		$result = $this->db->get();
		return $result;
	}

	public function getwithdrawLimitamount($tableName,$whr)
	{
		$this->db->select('*');
		$this->db->from($tableName);
		$this->db->where($whr);
		$result = $this->db->get();
		return $result;
	}

	public function getLocations($tableName,$whr)
	{
		$this->db->select('*');
		$this->db->from($tableName);
		$this->db->where($whr);
		$result = $this->db->get();
		return $result;
	}

	public function getLocationstates($tableName,$whr)
	{
		$this->db->select('*');
		$this->db->from($tableName);
		$this->db->where($whr);
		$this->db->distinct();
        $this->db->group_by('state');
		$result = $this->db->get();
		return $result;
	}


	public function getLocationcities($tableName,$whr)
	{
		$this->db->select('*');
		$this->db->from($tableName);
		$this->db->where($whr);
		$this->db->distinct();
        $this->db->group_by('city');
        // $this->db->get();
		// print_r($this->db->last_query());
		// exit;
		$result = $this->db->get();
		return $result;
	}


	public function getLocationpincodes($tableName,$whr)
	{
		$this->db->select('*');
		$this->db->from($tableName);
		$this->db->where($whr);
		$this->db->distinct();
        $this->db->group_by('pincode');
		$result = $this->db->get();
		return $result;
	}

	

	public function gettransactions($tableName,$whr)
	{
		$this->db->select('*');
		$this->db->from($tableName);
		$this->db->where($whr);
		$this->db->order_by('transaction_id','desc');
		$result = $this->db->get();
		return $result;
	}


	public function getSpinamoundetails($tableName,$whr)
	{
		$this->db->select('spin_amount_id,amount');
		$this->db->from($tableName);
		$this->db->where($whr);
		$result = $this->db->get();
		return $result;
	}


	public function getEarngames($tableName,$whr)
	{
		$this->db->select('*');
		$this->db->from($tableName);
		$this->db->where($whr);
		$this->db->order_by('earn_game_id','desc');
		$result = $this->db->get();
		return $result;
	}

	public function getEarngames123($tableName,$whr)
	{
		$this->db->select('*');
		$this->db->from($tableName);
		$this->db->where($whr);
		$this->db->limit(4);
		$this->db->order_by('earn_game_id','desc');
		$result = $this->db->get();
		return $result;
	}

	public function getEarngamesCompleteDetails($tableName,$whr)
	{
		$this->db->select('*');
		$this->db->from($tableName);
		$this->db->where($whr);
		$this->db->order_by('earn_game_id','desc');
		$result = $this->db->get();
		return $result;
	}

	public function getAssignEarngames($tableName,$whr)
	{
		$this->db->select('a.*,e.earn_game_title, e.earn_game_button_title, e.earn_game_amount, e.earn_game_url, e.earn_game_url, e.earn_game_code, e.earn_game_desc, e.earn_game_image, e.earn_game_start_date, e.earn_game_end_date');
		$this->db->from($tableName);
		$this->db->where($whr);
		$this->db->join('earn_games e','a.earn_game_id = e.earn_game_id','INNER');
		$result = $this->db->get();
		return $result;
	}


	public function getMyEarngamesDetails($tableName,$whr)
	{
		$this->db->select('u.*, e.earn_game_title, e.earn_game_button_title, e.earn_game_amount, e.earn_game_url, e.earn_game_url, e.earn_game_code, e.earn_game_desc, e.earn_game_image');
		$this->db->from($tableName);
		$this->db->where($whr);
		$this->db->join('earn_games e','u.earn_game_id = e.earn_game_id','INNER');
		$result = $this->db->get();
		return $result;
	}

	public function getUserOtpById($tableName,$whr)
	{
		$this->db->select('user_id, otp');
		$this->db->from($tableName);
		$this->db->where($whr);
		$result = $this->db->get()->row_array();
		return $result;
	}


	public function getUserDetailsById($tableName,$whr)
	{
		$this->db->select('*');
		$this->db->from($tableName);
		$this->db->where($whr);
		$result = $this->db->get()->row_array();
		return $result;
	}


	public function getBeneficiaryDetails($tableName,$whr)
	{
		$this->db->select('*');
		$this->db->from($tableName);
		$this->db->where($whr);
		$result = $this->db->get();
		return $result;
	}

	public function getOfferslogsearch($tableName,$whr)
	{
		$this->db->select('*');
		$this->db->from($tableName);
		$this->db->where($whr);
		$result = $this->db->get();
		return $result;
	}

	public function getRecordCount456()
	{
      $this->db->select('count(*) as allcount');
       $this->db->from('locations');
        $query = $this->db->get();
        $result = $query->result_array();      
        return $result[0]['allcount'];
    }

    public function getRecord456($rowno,$rowperpage) {     
    $this->db->select('*');
    $this->db->from('locations');
        $this->db->limit($rowperpage, $rowno);  
    $query = $this->db->get();        
    return $query->result_array();
  }


  public function getAssignGreenScratachCardDetails($tableName,$whr)
	{
		$this->db->select('a.*,s.scratch_title, s.scratch_amount, s.scratch_desc, s.scratch_code, s.scratch_image, s.scratch_url, s.scratch_color, s.start_date, s.type, s.end_date, u.name, u.mobile, u.email');
		$this->db->from($tableName);
		$this->db->where($whr);
		$this->db->join('scratchcard s','a.scratch_id = s.scratch_id','INNER');
		$this->db->join('users u','a.user_id = u.user_id','INNER');
		$result = $this->db->get();
		return $result;
	}

	public function getCustomersDataTransferDetails($tableName,$whr)
	{
		$this->db->select('t.*');
		$this->db->from($tableName);
		$this->db->where($whr);
		// $this->db->join('users u','t.user_id = u.user_id','RIGHT');
		// $this->db->join('beneficiaries b','t.user_id = b.user_id','RIGHT');
		$result = $this->db->get();
		return $result;
	}






}	