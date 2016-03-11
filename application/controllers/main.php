<?php
    class Main extends CI_Controller
    {
        public function index()
        {
            $this->load->model('user_interface/personal_area_model');
            $this->load->model('user_interface/main_model');

            $user_id = $this->session->userdata('id');

            $data['css'] = 'main';
            $data['gender'] = '';

                if ($this->session->userdata('gender'))
                {
                    $data['gender'] = $this->session->userdata('gender');
                }

                if ($user_id != '')
                {
                    $data['new_messages'] = $this->personal_area_model->get_new_messages($user_id);
                    if ($data['gender'] == 0 || $data['gender'] == 1)
                    {
                        $data['credits'] = $this->personal_area_model->user_credits($user_id);
                    }
                    else
                    {
                        $data['gifts'] = $this->personal_area_model->user_gifts($user_id);
                    }
                }


            $data['avatar'] = $this->main_model->get_avatar($user_id);

            $this->load->view('user_interface/header', $data);
            $this->load->view('user_interface/main_page');
            $this->load->view('user_interface/footer');
        }
    }