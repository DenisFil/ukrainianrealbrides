<?php
    class Personal_area extends CI_Controller
    {
        public function index()
        {
            $this->load->model('user_interface/personal_area_model');
            $user_id = $this->session->userdata('id');

            $photos = $this->personal_area_model->get_fotos($user_id);
            $data['avatar'] = $photos[0]->avatar;
            $data['new_messages'] = $this->personal_area_model->get_new_messages($user_id);
            $data['users_online'] = $this->personal_area_model->users_online(time());
            $data['credits'] = $this->personal_area_model->user_credits($user_id);
            $data['css'] = 'personal_area';
            $data['gender'] = '';
                if ($this->session->userdata('gender'))
                {
                    $data['gender'] = $this->session->userdata('gender');
                }

            $this->load->view('user_interface/header', $data);
            $this->load->view('user_interface/personal_area');
            $this->load->view('user_interface/footer');
        }
    }