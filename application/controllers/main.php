<?php
    class Main extends CI_Controller
    {
        public function index()
        {
            $data['css'] = 'main';
            $data['user_sex'] = '';
                if ($this->session->userdata('user_sex'))
                {
                    $data['user_sex'] = $this->session->userdata('user_sex');
                }

            $this->load->view('user_interface/header', $data);
            $this->load->view('user_interface/main_page');
            $this->load->view('user_interface/footer');
        }
    }