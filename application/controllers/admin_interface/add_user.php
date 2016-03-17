<?php
    class Add_user extends CI_Controller
    {
        public function index()
        {
            $this->load->view('admin_interface/header');
            $this->load->view('admin_interface/add_user');
            $this->load->view('admin_interface/footer');
        }
    }