<?php
    class Main_admin extends CI_Controller
    {
        public function __construct()
        {
            parent::__construct();

            $this->load->model('admin_interface/main_admin_model');
        }

        public function index ()
        {
            $counts = $this->main_admin_model->counts();

            $this->load->view('admin_interface/header', $counts);
            $this->load->view('admin_interface/main');
            $this->load->view('admin_interface/footer');
        }
    }