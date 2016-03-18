<?php 
	class Login extends CI_Controller
	{
		public function index()
		{
			$operator_id = $this->session->userdata('operator_id');
			if (!empty($operator_id))
			{
				redirect(base_url() . 'operator/main');
			}
			else
			{
				$this->load->view('operator/login');
			}
		}

		public function signin()
		{
			$result = array();
			$data = $this->input->post();
			$this->load->model('operator/get_model');
			$password = $this->get_model->get_password($data['login']);
				if (!empty($password))
				{
					if ($password[0]->password == md5($data['password']))
					{
						$this->session->set_userdata('operator_id', $password[0]->id);
						$result['result'] = 1;
					}
					else
					{
						$result['result'] = 0;
					}
				}
				else
				{
					$result['result'] = 2;
				}
			echo json_encode($result);
		}
	}