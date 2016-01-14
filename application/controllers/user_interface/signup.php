<?php
    class Signup extends CI_Controller
    {
        public function __construct()
        {
            parent::__construct();

            $this->load->model('user_interface/signup_model');
        }

        public function index()
        {
            $user_data = $this->input->post();
            $this->load->library('form_validation');
            $rules = array(
                array('field' => 'name', 'rules' => 'required|min_length[3]|max_length[20]|alpha'),
                array('field' => 'email', 'rules' => 'required'),
                array('field' => 'password', 'rules' => 'required|min_length[3]|max_length[20]|alpha_numeric')
            );
            $this->form_validation->set_rules($rules);
            $validation_result = $this->form_validation->run($user_data);
                if ($validation_result === TRUE)
                {
                    $user_data['password'] = md5($user_data['password']);
                    $query = $this->signup_model->insert_new_user($user_data);
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

        public function email()
        {
            $user_email = $this->input->post('email');

            $query = $this->signup_model->get_user_email($user_email);
                if (count($query) > 0)
                {
                    $result['result'] = 0;
                }
                else
                {
                    $result['result'] = 1;
                }
            echo json_encode($result);
        }
    }