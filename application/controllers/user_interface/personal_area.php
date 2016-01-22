<?php
    class Personal_area extends CI_Controller
    {
        public function index()
        {
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