<?php
 
 defined("BASEPATH") OR exit("No direct script access allowed");

  class Banner extends CI_Controller {


  	public function __Construct(){

  		parent::__Construct();

  		$this->load->model('UserModel' ,'um');

  		$this->admin=$this->session->userdata('admin_id');

  	}


  	public function index()
  	{
  		$data['page_title']="banners";

  		$data['banners']=$this->um->getBanners("banner",[]);

  		$this->settemplate->dashboard("banner/index",$data);
  	}


  	public function create()
  	{
  		$data['page_title']="Banners Create";

  		$this->settemplate->dashboard("banner/create",$data);

  	}


    public function insert()
    {
    	$this->form_validation->set_rules('banner_titile','banner_titile','trim|required');
    	// $this->form_validation->set_rules('banner_desc','banner_desc','trim|required');


    	if($this->form_validation->run() == FALSE)
    	{
    		
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

    		$this->create();
    	}
    	else
    	{

    		$image_path ="";
    		//insert Image hers 

    		if(isset($_FILES['banner_image']) && $_FILES['banner_image']['size']>0){
    			$getFlag=0;
    			$imgName=$_FILES['banner_image']['name'];
    			$file_size=$_FILES['banner_image']['size'];
    			$file_tmp=$_FILES['banner_image']['tmp_name'];

    			$temp_tr=explode(".", $_FILES['banner_image']["name"]);
    			$file_ext=end($temp_tr);
    			$expensions=array("jpeg","jpg","png");

    			if(in_array($file_ext,$expensions)===false)
          {
    				$getFlag=1;
    				$this->session->set_flashdata(['status'=>401,'message'=>'Invalid File.Image']);

    	    }
          if($file_size > 10194304){
            $getFlag = 2;
              $this->session->set_flashdata(['status' => 401,'message' =>'File size must be excately 10 MB.']);
          }

    			if($getFlag==0)
          { 
                 
            $file_name = round(microtime(true)) . '.' . end($temp_tr);

			    	$img_directory =  "assets/profiles";

                    if (!file_exists($img_directory)) 
                {
					    mkdir($img_directory, 0777, true);
					      }
						$image_path = base_url().$img_directory."/".$file_name;
					move_uploaded_file($file_tmp,$img_directory."/".$file_name);

    			}

    		}

    		$date= date('Y-m-d H:i:s');

    		// $characters ='0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    		// $charactersLength =strlen($characters);
    		// $randstring='';
    		// if($characters>0){

    		// 	for($j =0;$j<6; $j++){
    		// 		$randstring .=$characters[rand(0,$charactersLength -1)];

    		//} 


        $banners = $this->um->getBanners("banner",[])->result_array();


    			$userData =[
                      'banner_titile' => $this->input->post('banner_titile'),
                       'banner_desc'  => $this->input->post('banner_desc'),
                       'type'  => $this->input->post('type'),
                       'url'  => $this->input->post('url'),
                       'banner_image' => $image_path,
                       'priority'=> count($banners)+1,
                       'created_at' =>  $date
    			    ];

    			    $userId=$this->um->insertData("banner",$userData);

    			    if($userId>0){
    			    	$this->session->set_flashdata('sucess_msg' ,"Banner Created Successfully.");
    			    	redirect('banner');

    			    }else{

        $this->session->set_flashdata('error_msg',  "Failed, Somthing went wrong.");

        redirect('banner');

      }

    		}

    }


    


     
     public function edit($banner_id)
     {
          $data['page_title']="Banner Update";
          $data['banner']=$this->um->getBanners("banner",['banner_id'=>$banner_id])->row_array();

          $this->settemplate->dashboard("banner/edit" ,$data);

     }



     public function update($banner_id)
     {

    $this->form_validation->set_rules('banner_titile','banner_titile', 'trim|required');
    // $this->form_validation->set_rules('banner_desc','banner_desc', 'trim|required');
    


    if ($this->form_validation->run() == FALSE)

    {
      $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

      $this->edit($banner_id);
    }

    else
    {
      $image_path = "";
      //insert Image here
      if(isset($_FILES['banner_image']) && $_FILES['banner_image']['size'] > 0){
        $getFlag = 0;
        $imgName = $_FILES['banner_image']['name'];
        $file_size =$_FILES['banner_image']['size'];
        $file_tmp =$_FILES['banner_image']['tmp_name'];

        $temp_tr = explode(".", $_FILES["banner_image"]["name"]);
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
      }else{
        $getImg = $this->um->getBanners("banner",['banner_id' => $banner_id])->row_array();
        if($getImg['banner_image'] != ""){
          $image_path = $getImg['banner_image'];
        }else{
          $image_path = "";
        }
      }


      $whr = ['banner_id' => $banner_id];

      $date = date('Y-m-d H:i:s');

      $userData = [

        
        'banner_titile' => $this->input->post('banner_titile'),

        'banner_desc' => $this->input->post('banner_desc'),

        'type'  => $this->input->post('type'),

        'url' => $this->input->post('url'),


        'banner_image' => $image_path,
      ];



      $userId = $this->um->updateData("banner",$userData,$whr);

           

      if($userId > 0){

        $this->session->set_flashdata('success_msg',  "Banner Updated Successfully.");

        redirect('banner');

      }else{

        $this->session->set_flashdata('error_msg',  "Failed, Somthing went wrong.");

        redirect('banner');

      }

      

    }

  }

     

    
          public function delete($banner_id)
          {
            $whr=['banner_id'=>$banner_id];

            $lastId= $this->um->deleteData("banner",$whr);
            if($lastId>0){
              $this->session->set_flashdata('success_msg',  "Banner Delete Successfully.");
            }else{
              $this->session->set_flashdata('error_msg',  "Banner Delete Successfully.");
            }

            redirect('banner');
          }




  public function testscoursesortorder()
  {
        $banner_id = $this->input->post('banner_id');
        $sortID = $this->input->post('sortID');

        // echo "<pre>";
        // print_r($subject_id);

        // exit;

      if(count($banner_id) > 0){
          for ($i=0; $i < count($banner_id); $i++) { 
            $whr = [
              'banner_id' => $banner_id[$i]
          ];
            $itObject = [
              'priority' => $sortID[$i],
            ];

            // echo "<pre>";
            // print_r($whr);
            // echo "<br>";
            // print_r($itObject);
            // exit;

            $itLastId = $this->um->updateData("banner",$itObject,$whr);
          }
        }
      if($itLastId > 0){
        $this->session->set_flashdata('success_msg',  "Changed Successfully.");
      }else{
        $this->session->set_flashdata('error_msg',  "Failed, Somthing went wrong.");
      }
      redirect('banner');
  }



    }


        








  