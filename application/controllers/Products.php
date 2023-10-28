<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {

	public function __Construct(){
		parent::__Construct();
		$this->load->model('UserModel', 'um');
		$this->load->library('Pagination');
	}
	
	public function index()
	{
		$data['page_title'] = "Products Page";
		$data['products'] = $products = $this->um->getProductDjnilujoetails("tbl_product p",['p.status' => 1]);
		$this->settemplate->dashboard("products/index",$data);
	}

	public function loadData123($record=0) {
		$recordPerPage = 10;
		if($record != 0){
			$record = ($record-1) * $recordPerPage;
		}      	
      	$recordCount = $this->um->getRecordCount();
      	$empRecord = $this->um->getRecord($record,$recordPerPage);
      	$config['base_url'] = base_url().'Products/loadData123';
      	$config['use_page_numbers'] = TRUE;
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Previous';
		$config['total_rows'] = $recordCount;
		$config['per_page'] = $recordPerPage;
		$this->pagination->initialize($config);
		$data['pagination'] = $this->pagination->create_links();
		$data['empData'] = $empRecord;
		echo json_encode($data);		
	}

	public function loadData($record=0) {
		$recordPerPage = 10;
		if($record != 0){
			$record = ($record-1) * $recordPerPage;
		}      	
      	$recordCount = $this->um->getRecordCount123();
      	$empRecord = $this->um->getRecord123($record,$recordPerPage);
      	$config['base_url'] = base_url().'products/loadData';
      	$config['use_page_numbers'] = TRUE;
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Previous';
		$config['total_rows'] = $recordCount;
		$config['per_page'] = $recordPerPage;
		$this->pagination->initialize($config);
		$data['pagination'] = $this->pagination->create_links();
		$data['empData'] = $empRecord;
		echo json_encode($data);		
	}

	public function create()
	{
		$data['page_title'] = "Products Create";
		$data['categories'] = $this->um->getCategories("categories",['status' => 1]);
		$data['sub'] = $this->um->getSubCategories("sucategories s",['s.status' => 1]);
		$data['rates'] = $this->um->getRates("rates",['status' => 1]);
		$this->settemplate->dashboard("products/create",$data);
	}

	public function insert()
	{
		$this->form_validation->set_rules('name', 'Name', 'trim|required');
		$this->form_validation->set_rules('sub_cat_id', 'Category', 'trim|required');
		$this->form_validation->set_rules('style_code', 'stylecode', 'trim|required');
		// $this->form_validation->set_rules('description', 'description', 'trim|required');
		$this->form_validation->set_rules('net_weight', 'Net Weight', 'trim|required');
		$this->form_validation->set_rules('product_weight', 'Product Weight', 'trim|required');

		if ($this->form_validation->run() == FALSE)
		{	
			$this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
			$this->create();
		}		
		else	
		{
			// echo "<pre>";
			// print_r($_POST);
			// exit;
			$image_path = "";
			//insert Image here
			if(isset($_FILES['front_image']) && $_FILES['front_image']['size'] > 0){
				$getFlag = 0;
				$imgName = $_FILES['front_image']['name'];
				$file_size =$_FILES['front_image']['size'];
				$file_tmp =$_FILES['front_image']['tmp_name'];

				$temp_tr = explode(".", $_FILES["front_image"]["name"]);
				$file_ext = end($temp_tr);
				$expensions= array("jpeg","jpg","png");
				if(in_array($file_ext,$expensions)=== false){
					$getFlag = 1;
					$this->session->set_flashdata(['status' => 401,'message' =>'Invalid File.Image']);
			  	}
			  	if($file_size > 10194304){
			  		$getFlag = 2;
			        $this->session->set_flashdata(['status' => 401,'message' =>'File size must be excately 10 MB.']);
			    }

			    if($getFlag == 0){
			    	$file_name = round(microtime(true)) . '.' . end($temp_tr);

			    	$img_directory =  "assets/profiles";
			    	if (!file_exists($img_directory)) {
					    mkdir($img_directory, 0777, true);
					}
						$image_path = base_url().$img_directory."/".$file_name;
					move_uploaded_file($file_tmp,$img_directory."/".$file_name);
			    }
			}

			$date = date('Y-m-d');

			// $cate = $this->um->getAllCategories("tbl_categories",['category_id' => $this->input->post('category_id')])->row_array();

			$sub = $this->um->getSubCategories("sucategories s",['s.sub_cat_id' => $this->input->post('sub_cat_id')])->row_array();




			
			$productData = [
				'category_id' => $sub['category_id'],
				'name' => $this->input->post('name'),
				'style_code' => $this->input->post('style_code'),
				'description' => $this->input->post('description'),
				'front_image' => $image_path,
				'weight' => $this->input->post('product_weight'),
				'net_weight' => $this->input->post('net_weight'),
				'type' => $this->input->post('type'),
				'discount' => $this->input->post('discount'),
				'sub_cat_id' => $this->input->post('sub_cat_id'),
				'price_type' => $this->input->post('price_type'),
				'type' => $this->input->post('product_type'),
				'clousure' => $this->input->post('clousure'),
				'size' => $this->input->post('size'),
				'stock' => $this->input->post('stock'),
				'diamond_carat' => $this->input->post('diamond_carat'),
				'diamond_color' => $this->input->post('diamond_color'),
				'diamond_pcs' => $this->input->post('diamond_pcs'),
				'diamond_clarity' => $this->input->post('diamond_clarity'),
				'created_at' => $date
			];

			$productId = $this->um->insertData("tbl_product",$productData);

			$stock = [
						'product_id' => $productId,
						'stock' => $this->input->post('stock'),
						'created_at' => $date
					];

					$stockdetails = $this->um->insertData("tbl_stock",$stock);

			$userprofilesaea23 = [
						'product_id' => $productId,
						'image' => $image_path,
					];

					$userId1212 = $this->um->insertData("tbl_image",$userprofilesaea23);
			// echo "<pre>";
			// print_r($productId);
			// exit;
			if($productId > 0){

				$stone_name = $this->input->post('stone_name');
				$weight = $this->input->post('weight');
				$price = $this->input->post('price');
				$date = date('Y-m-d');

				$count = 0;
				$total_amount = 0;

				if(count($stone_name) > 0){
					for ($i=0; $i < count($stone_name); $i++) { 

						if($this->input->post('price_type') == "Fixed"){
							$total_amount = $total_amount;



						}else {

							$itObject = [
							'product_id' => $productId,
							'stone_name' => $stone_name[$i],
							'weight' => $weight[$i],
							'price' => $price[$i],
							'total' => $weight[$i] * $price[$i],
							'created_at' => $date
						];


						$itLastId = $this->um->insertData("tbl_stone",$itObject);

						$count = $weight[$i] * $price[$i];
						$total_amount = $total_amount + $count;
						

						}




						

						

				$products = $this->um->getProductDetails("tbl_product",['category_id' =>  $sub['category_id']])->result_array();

				$code = [
					// 'style_code' => $this->input->post('style_code')."00".count($products),
					'price' => $total_amount
				];

				$data = $this->um->updateData("tbl_product",$code,['product_id' => $productId]);
					}
				}


						//upload Multiple images
				$mulimage_path = "";
			//insert Image here
			if(count($_FILES['image']['name']) < 5){
				for ($i=0; $i < count($_FILES['image']['name']); $i++) { 
					if(isset($_FILES['image']) && $_FILES['image']['size'][$i] > 0){
						$getFlag = 0;
						$imgName = $_FILES['image']['name'][$i];
						$file_size =$_FILES['image']['size'][$i];
						$file_tmp =$_FILES['image']['tmp_name'][$i];

						$temp_tr = explode(".", $_FILES["image"]["name"][$i]);
						$file_ext = end($temp_tr);
						
					  	if($file_size > 10194304){
					  		$getFlag = 2;
					  		$this->session->set_flashdata('error_msg',  "File size must be excately 10.");
					  		// redirect('products/show/'.$product_id);
					    }

					    if($getFlag == 0){
					    	$file_name = round(microtime(true)) . '.' . end($temp_tr).$i;

					    	$img_directory =  "assets/profiles";
					    	if (!file_exists($img_directory)) {
							    mkdir($img_directory, 0777, true);
							}
							$mulimage_path = base_url().$img_directory."/".$file_name;
							move_uploaded_file($file_tmp,$img_directory."/".$file_name);
					    }
					}else{
						$mulimage_path = "";
					}
					$userprofile = [
						'product_id' => $productId,
						'image' => $mulimage_path,
					];

					$userId = $this->um->insertData("tbl_image",$userprofile);
				}
			}

						
				$this->session->set_flashdata('success_msg',  "Product Created Successfully.");
			}else{
				$this->session->set_flashdata('error_msg',  "Failed, Somthing went wrong.");
			}
			redirect('products');
		}
	}

	public function edit($product_id)
	{
		$data['page_title'] = "Products Update";
		$data['categories'] = $this->um->getCategories("categories",['status' => 1]);
		$data['sub'] = $this->um->getSubCategories("sucategories s",['s.status' => 1]);
		$data['rates'] = $this->um->getRates("rates",['status' => 1]);
		$data['products'] = $this->um->getProductDjnilujoetails("tbl_product p",['p.product_id' => $product_id])->row_array();

		$data['subcategory'] = $this->um->getSubCategories("sucategories s",['s.sub_cat_id' => $data['products']['sub_cat_id']])->row_array();
		$data['stonetypes'] = $this->um->getStoneTypes("tbl_stone",['product_id' => $product_id]);

		$this->settemplate->dashboard("products/edit",$data);
	}

	public function update($product_id)
	{
		$this->form_validation->set_rules('name', 'Name', 'trim|required');
		$this->form_validation->set_rules('sub_cat_id', 'Category', 'trim|required');
		$this->form_validation->set_rules('style_code', 'stylecode', 'trim|required');
		// $this->form_validation->set_rules('description', 'description', 'trim|required');
		$this->form_validation->set_rules('net_weight', 'Net Weight', 'trim|required');
		$this->form_validation->set_rules('product_weight', 'Product Weight', 'trim|required');
		if ($this->form_validation->run() == FALSE)
		{	
			$this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
			$this->edit($product_id);
		}		
		else	
		{
			$image_path = "";
			//insert Image here
			if(isset($_FILES['front_image']) && $_FILES['front_image']['size'] > 0){
				$getFlag = 0;
				$imgName = $_FILES['front_image']['name'];
				$file_size =$_FILES['front_image']['size'];
				$file_tmp =$_FILES['front_image']['tmp_name'];

				$temp_tr = explode(".", $_FILES["front_image"]["name"]);
				$file_ext = end($temp_tr);
				$expensions= array("jpeg","jpg","png");
				if(in_array($file_ext,$expensions)=== false){
					$getFlag = 1;
					$this->session->set_flashdata('success_msg',  "Invalid File.Image.");
			  	}
			  	if($file_size > 10194304){
			  		$getFlag = 2;
			        $this->session->set_flashdata(['status' => 401,'message' =>'File size must be excately 4 MB.']);
			    }

			    if($getFlag == 0){
			    	$file_name = round(microtime(true)) . '.' . end($temp_tr);

			    	$img_directory =  "assets/profiles";
			    	if (!file_exists($img_directory)) {
					    mkdir($img_directory, 0777, true);
					}
						$image_path = base_url().$img_directory."/".$file_name;
					move_uploaded_file($file_tmp,$img_directory."/".$file_name);
			    }
			}
			else{
				$getImg = $this->um->getproductImages("tbl_product", ['product_id' => $product_id])->row_array();
				if($getImg['front_image'] != ""){
					$image_path = $getImg['front_image'];
				}else{
					$image_path = "";
				}
			}

			$whr = ['product_id' => $product_id];

			$jhkljoij = $this->um->deleteData("tbl_stone",$whr);

			$date = date('Y-m-d');

			$sub = $this->um->getSubCategories("sucategories s",['s.sub_cat_id' => $this->input->post('sub_cat_id')])->row_array();

			$data['products'] = $products = $this->um->getProductDjnilujoetails("tbl_product p",['p.product_id' => $product_id])->row_array();
			
			$productData = [
				'category_id' => $sub['category_id'],
				'name' => $this->input->post('name'),
				'style_code' => $this->input->post('style_code'),
				'description' => $this->input->post('description'),
				'front_image' => $image_path,
				'weight' => $this->input->post('product_weight'),
				'net_weight' => $this->input->post('net_weight'),
				'type' => $this->input->post('type'),
				'discount' => $this->input->post('discount'),
				'sub_cat_id' => $this->input->post('sub_cat_id'),
				'price_type' => $this->input->post('price_type'),
				'type' => $this->input->post('product_type'),
				'clousure' => $this->input->post('clousure'),
				'size' => $this->input->post('size'),
				'stock' => $this->input->post('stock') + $products['stock'],
				'created_at' => $date
			];


			$productId = $this->um->updateData("tbl_product",$productData,$whr);

			$stock = [
						'product_id' => $product_id,
						'stock' => $this->input->post('stock'),
						'created_at' => $date
					];

					$stockdetails = $this->um->insertData("tbl_stock",$stock);


			if($productId > 0){
			$stone_name = $this->input->post('stone_name');
				$weight = $this->input->post('weight');
				$price = $this->input->post('price');
				$date = date('Y-m-d');

				$count = 0;
				$total_amount = 0;

				// echo "<pre>";
				// print_r($stone_name);
				// exit;

				if($stone_name == '') {
				}else {
					if(count($stone_name) > 0){
					for ($i=0; $i < count($stone_name); $i++) { 


						$itObject = [
							'product_id' => $product_id,
							'stone_name' => $stone_name[$i],
							'weight' => $weight[$i],
							'price' => $price[$i],
							'total' => $weight[$i] * $price[$i],
							'created_at' => $date
						];


						$itLastId = $this->um->insertData("tbl_stone",$itObject);

						$count = $weight[$i] * $price[$i];
						$total_amount = $total_amount + $count;

				$products = $this->um->getProductDetails("tbl_product",['category_id' =>  $this->input->post('category_id')])->result_array();

				$code = [
					// 'style_code' => $this->input->post('style_code')."00".count($products),
					'price' => $total_amount
				];

				$data = $this->um->updateData("tbl_product",$code,['product_id' => $product_id]);
					}
				}
				}

				
	$images = $this->um->getbackgroundeImagesProductTypes("tbl_image",['product_id' => $product_id])->result_array();
	
	if(count($images) <= 4) {			

            	//upload Multiple images
			$mulimage_path = "";
			//insert Image here
			if(count($_FILES['image']['name']) > 0){
				for ($i=0; $i < count($_FILES['image']['name']); $i++) { 
					if(isset($_FILES['image']) && $_FILES['image']['size'][$i] > 0){
						$getFlag = 0;
						$imgName = $_FILES['image']['name'][$i];
						$file_size =$_FILES['image']['size'][$i];
						$file_tmp =$_FILES['image']['tmp_name'][$i];

						$temp_tr = explode(".", $_FILES["image"]["name"][$i]);
						$file_ext = end($temp_tr);
						
					  	if($file_size > 10194304){
					  		$getFlag = 2;
					  		$this->session->set_flashdata('error_msg',  "File size must be excately 10.");
					  		// redirect('products/show/'.$product_id);
					    }

					    if($getFlag == 0){
					    	$file_name = round(microtime(true)) . '.' . end($temp_tr).$i;

					    	$img_directory =  "assets/profiles";
					    	if (!file_exists($img_directory)) {
							    mkdir($img_directory, 0777, true);
							}
							$mulimage_path = base_url().$img_directory."/".$file_name;
							move_uploaded_file($file_tmp,$img_directory."/".$file_name);
					    }
					}else{
						$mulimage_path = "";
					}

					if($mulimage_path == ''){

					}else {
						$userprofile = [
						'product_id' => $product_id,
						'image' => $mulimage_path,
					];

					$userId = $this->um->insertData("tbl_image",$userprofile);

					}
					
				}
			}

		}else { 
		}






				$this->session->set_flashdata('success_msg',  "Product Updated Successfully.");
			}else{
				$this->session->set_flashdata('error_msg',  "Failed, Somthing went wrong.");
			}
			redirect('products');
		}
	}

	public function delete($product_id)
	{
		$whr = ['product_id'=> $product_id];
		$set = ['status' => 0];
		$deleteId = $this->um->updateData("tbl_product",$set,$whr);
		if($deleteId > 0){
			$this->session->set_flashdata('success_msg',  "Product Deleted Successfully.");
		}else{
			$this->session->set_flashdata('error_msg',  "Failed, Somthing went wrong.");
		}
		redirect('products');
	}

	public function show($product_id)
	{
		$data['page_title'] = "Show";

		$data['products'] = $products = $this->um->getProductDjnilujoetails("tbl_product p",['p.product_id' => $product_id])->row_array();

	    $data['images'] = $this->um->getbackgroundeImagesProductTypes("tbl_image",['product_id' => $product_id]);

	    $data['prorate'] = $prorate = $this->um->getRates('rates',['name' => $products['type']])->row_array();

	    $data['stonedata'] = $stonedata = $this->um->getProductStones("tbl_stone",['product_id' => $product_id])->result_array();

	    $data['stones'] = $this->um->getStoneTypes("tbl_stone",['product_id' => $product_id]);
		// echo "<pre>";
		// print_r($data['products']);
		// exit;
		$this->settemplate->dashboard("products/show",$data);
	}


	public function getmake()

	{

		$response = array();

		$category_id = $this->input->post('category_id');

		$response['make'] =  $this->um->getSubCategories("sucategories s",['s.category_id' => $category_id])->result_array();

		echo json_encode($response);
	}

	public function stock($product_id)
	{
		$data['page_title'] = "Products Update";
		$data['stock'] = $this->um->getStocks("tbl_stock",['product_id' => $product_id]);

		$this->settemplate->dashboard("products/stock",$data);
	}

	public function testing()
    {
    	//print_r($this->input->post('userids'));
    	$product_id = $this->input->post('product_id');

    	$date = date('Y-m-d');

    	//print_r($userIds);
    	if(count($product_id) > 0){
    		for ($k=0; $k < count($product_id); $k++) { 
				  $whr = ['product_id' => $product_id[$k]];
		          $set = ['stock' => $this->input->post('stock')];
				$lastId = $this->um->updateData("tbl_product",$set,$whr);


				$stock = [
						'product_id' => $product_id[$k],
						'stock' => $this->input->post('stock'),
						'created_at' => $date
					];

					$stockdetails = $this->um->insertData("tbl_stock",$stock);
				
				if($lastId > 0){
					$this->session->set_flashdata('success_msg',  "Product Stock Updated Successfully.");
				}else{
					$this->session->set_flashdata('error_msg',  "Failed, Somthing went wrong.");
				}
				 
    
    		}
    	}
    	
    	redirect('products');
    }


    public function newarrival($product_id)
	{
		$whr = ['product_id'=> $product_id];
		$set = ['new_arrival' => 1];
		$deleteId = $this->um->updateData("tbl_product",$set,$whr);
		if($deleteId > 0){
			$this->session->set_flashdata('success_msg',  "New Arrival Successfully.");
		}else{
			$this->session->set_flashdata('error_msg',  "Failed, Somthing went wrong.");
		}
		redirect('products');
	}

	public function newarrivalaccept($product_id)
	{
		$whr = ['product_id'=> $product_id];
		$set = ['new_arrival' => 0];
		$deleteId = $this->um->updateData("tbl_product",$set,$whr);
		if($deleteId > 0){
			$this->session->set_flashdata('success_msg',  "Remove NewAriival List.");
		}else{
			$this->session->set_flashdata('error_msg',  "Failed, Somthing went wrong.");
		}
		redirect('products');
	}
}