<?php
    class Main extends CI_Controller
    {
        public function index()
        {
            $this->load->model('user_interface/personal_area_model');
            $user_id = $this->session->userdata('id');

            $data['css'] = 'main';
            $data['gender'] = '';
            $data['new_messages'] = $this->personal_area_model->get_new_messages($user_id);
            $data['users_online'] = $this->personal_area_model->users_online(time());
            $data['credits'] = $this->personal_area_model->user_credits($user_id);
                if ($this->session->userdata('gender'))
                {
                    $data['gender'] = $this->session->userdata('gender');
                }

            $this->load->view('user_interface/header', $data);
            $this->load->view('user_interface/main_page');
            $this->load->view('user_interface/footer');
        }
    }