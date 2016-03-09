<?php
    class MY_Controller extends CI_Controller
    {
        public function __construct()
        {
            parent::__construct();

            $this->load->model('user_interface/main_model');

            $user_id = $this->session->userdata('id');

            if ($user_id)
            {
                $this->online($user_id);
            }
        }

        private function online($id)
        {
            $time = array ('last_online' => time());

            $this->main_model->online($id, $time);
        }
    }