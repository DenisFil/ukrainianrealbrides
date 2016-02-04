<?php
    class Support extends CI_Controller
    {
        public function index()
        {
            $data = array();
            if ($this->session->userdata('id'))
            {
                $user_id = $this->session->userdata('id');

                $data['new_messages'] = $this->personal_area_model->get_new_messages($user_id);
                $data['users_online'] = $this->personal_area_model->users_online(time());
                $data['credits'] = $this->personal_area_model->user_credits($user_id);
                $data['css'] = 'support';
                $data['gender'] = '';
                if ($this->session->userdata('gender'))
                {
                    $data['gender'] = $this->session->userdata('gender');
                }
            }
            else
            {
                $data['css'] = 'support';
            }

            $this->load->view('user_interface/header', $data);
            $this->load->view('user_interface/support');
            $this->load->view('user_interface/footer');
        }
    }