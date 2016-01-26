<?php
    class Main extends CI_Controller
    {
        public function index()
        {
            $data['css'] = 'main';
            $data['gender'] = '';
                if ($this->session->userdata('gender'))
                {
                    $data['gender'] = $this->session->userdata('gender');
                }

            $this->load->view('user_interface/header', $data);
            $this->load->view('user_interface/main_page');
            $this->load->view('user_interface/footer');
        }
    }