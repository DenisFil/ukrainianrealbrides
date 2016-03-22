<?php 
	class Sorry_result extends MY_Controller
	{
		public function index()
		{
			$this->load->view('first_page/header');
			$this->load->view('first_page/sorry_result');
			$this->load->view('first_page/footer');
		}
	}