<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Faqs extends CI_Controller {

	public function __Construct(){
		parent::__Construct();
		$this->load->model('UserModel', 'um');
	}
	
	public function index()
	{
		$data['page_title'] = "Faq's Page";
		$data['faqs'] = $this->um->getFaqsDetails("faqs f",['f.status' => 1]);
		$this->settemplate->dashboard("faq/index",$data);
	}
}