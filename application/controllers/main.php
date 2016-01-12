<?php
    class Main extends CI_Controller
    {
        public function index()
        {

            $this->load->view('user_interface/header');
            $this->load->view('user_interface/main_page');
            $this->load->view('user_interface/footer');
        }
    }