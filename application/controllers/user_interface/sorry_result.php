<?php 
	class Sorry_result extends MY_Controller
	{
		public function index()
		{
			$data['login'] = 1;
			$data['css'] = 'sorry_result';
			$data['gender'] = 1;
			
			$this->load->view('first_page/header', $data);
			$this->load->view('first_page/sorry_result');
			$this->load->view('first_page/footer');
		}
	}