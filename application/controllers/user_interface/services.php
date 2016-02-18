<?php
    class Services extends CI_Controller
    {
        public function index()
        {
            $this->load->model('user_interface/personal_area_model');
            $user_id = $this->session->userdata('id');

            $data['css'] = 'services';
            $data['gender'] = '';
            if ($this->session->userdata('gender'))
            {
                $data['gender'] = $this->session->userdata('gender');
            }
            if ($user_id != '')
            {
                $data['new_messages'] = $this->personal_area_model->get_new_messages($user_id);
                $data['users_online'] = $this->personal_area_model->users_online(time());
                if ($data['gender'] == 0 || $data['gender'] == 1)
                {
                    $data['credits'] = $this->personal_area_model->user_credits($user_id);
                }
                else
                {
                    $data['gifts'] = $this->personal_area_model->user_gifts($user_id);
                }
            }

            $this->load->view('user_interface/header', $data);
            $this->load->view('user_interface/services');
            $this->load->view('user_interface/footer');
        }
    }