<?php
    class Personal_area extends CI_Controller
    {
        public function index()
        {
            $this->load->model('user_interface/personal_area_model');

            $data['new_messages'] = $this->personal_area_model->get_new_messages($this->session->userdata('id'));
            $data['css'] = 'personal_area';
            $data['gender'] = '';
                if ($this->session->userdata('gender'))
                {
                    $data['gender'] = $this->session->userdata('gender');
                }

            $this->load->view('user_interface/header', $data);
            $this->load->view('user_interface/personal_area');
            $this->load->view('user_interface/footer');
        }
    }