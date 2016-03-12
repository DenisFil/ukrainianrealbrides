<?php
    class User_profiles extends CI_Controller
    {
        public function index()
        {
            $this->load->view('admin_interface/header');
            $this->load->view('admin_interface/user_profiles');
            $this->load->view('admin_interface/footer');
        }
    }