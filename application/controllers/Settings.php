<?php
 
 defined("BASEPATH") OR exit("No direct script access allowed");

  class Settings extends CI_Controller {


  	public function __Construct(){

  		parent::__Construct();

  		$this->load->model('UserModel' ,'um');

  		$this->admin=$this->session->userdata('admin_id');

  	}


  	public function index()
  	{
  		$data['page_title']="banners";

  		$data['settings']=$this->um->getreferralsettings("referral_settings",[]);

  		$this->settemplate->dashboard("referral/index",$data);
  	}

     public function edit($referral_setting_id)
     {
          $data['page_title']="Banner Update";
          $data['settings']=$this->um->getreferralsettings("referral_settings",['referral_setting_id'=>$referral_setting_id])->row_array();

          $this->settemplate->dashboard("referral/edit" ,$data);

     }



     public function update($referral_setting_id)
     {

    $this->form_validation->set_rules('referral_title','Referral title', 'trim|required');
    $this->form_validation->set_rules('referral_amount','referral_amount', 'trim|required');
    


    if ($this->form_validation->run() == FALSE)

    {
      $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');

      $this->edit($referral_setting_id);
    }

    else
    {
      $image_path = "";
      //insert Image here
      if(isset($_FILES['referral_banner']) && $_FILES['referral_banner']['size'] > 0){
        $getFlag = 0;
        $imgName = $_FILES['referral_banner']['name'];
        $file_size =$_FILES['referral_banner']['size'];
        $file_tmp =$_FILES['referral_banner']['tmp_name'];

        $temp_tr = explode(".", $_FILES["referral_banner"]["name"]);
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
        $getImg = $this->um->getreferralsettings("referral_settings",['referral_setting_id'=>$referral_setting_id])->row_array();
        if($getImg['referral_banner'] != ""){
          $image_path = $getImg['referral_banner'];
        }else{
          $image_path = "";
        }
      }


      $whr = ['referral_setting_id' => $referral_setting_id];

      $date = date('Y-m-d H:i:s');

      $userData = [

        
        'referral_title' => $this->input->post('referral_title'),

        'referral_desc' => $this->input->post('referral_desc'),

        'referral_url' => $this->input->post('referral_url'),

        'referral_amount' => $this->input->post('referral_amount'),

        'referral_tagline' => $this->input->post('referral_tagline'),

        'withdrawlimit' => $this->input->post('withdrawlimit'),


        'referral_banner' => $image_path,
      ];



      $userId = $this->um->updateData("referral_settings",$userData,$whr);

           

      if($userId > 0){

        $this->session->set_flashdata('success_msg',  "Referral Settings Updated Successfully.");

        redirect('settings');

      }else{

        $this->session->set_flashdata('error_msg',  "Failed, Somthing went wrong.");

        redirect('settings');

      }

      

    }

  }





    }


        








  