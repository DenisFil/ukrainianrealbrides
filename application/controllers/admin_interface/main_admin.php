<?php
    class Main_admin extends CI_Controller
    {
        public function index ()
        {
            $this->load->view('admin_interface/header');
            $this->load->view('admin_interface/main');
            $this->load->view('admin_interface/footer');
        }
    }