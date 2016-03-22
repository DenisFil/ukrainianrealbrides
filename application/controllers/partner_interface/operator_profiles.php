<?php
    class Operator_profiles extends CI_Controller
    {
        public function index()
        {
            $this->load->view('partner_interface/header');
            $this->load->view('partner_interface/operator_profiles');
            $this->load->view('partner_interface/footer');
        }
    }