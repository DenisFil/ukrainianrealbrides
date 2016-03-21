<?php
    class Main_partner extends CI_Controller
    {
        public function index()
        {
            $this->load->view('partner_interface/header');
            $this->load->view('partner_interface/main');
            $this->load->view('partner_interface/footer');
        }
    }