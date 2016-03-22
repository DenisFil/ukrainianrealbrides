<?php 
	class Sory extends MY_Controller
	{
		public function index()
		{
			$this->load->view('first_page/header');
			$this->load->view('first_page/sorry');
			$this->load->view('first_page/footer');
		}

		public function email()
		{
			$data['user_id'] = $this->session->userdata('user_id');
			$data['email'] = $this->input->post('email');
			$this->load->model('sory_model');
			$query = $this->sory_model->email($data);
				if ($query === TRUE)
				{
					$result['result'] = 1;
				}
				else
				{
					$result['result'] = 0;
				}
			echo json_encode($result);
		}
	}