<?php
    class Logout extends CI_Controller
    {
        public function index()
        {
            $this->load->model('user_interface/main_model');

            $data = array('gender', 'name', 'lastname', 'id');
            $this->main_model->set_offline($this->session->userdata('id'));
            $this->session->unset_userdata($data);

            header('Location: ' . base_url());
        }
    }