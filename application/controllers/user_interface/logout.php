<?php
    class Logout extends CI_Controller
    {
        public function index()
        {
            $data = array('gender', 'name', 'lastname', 'id');
            $this->session->unset_userdata($data);
            header('Location: ' . base_url());
        }
    }