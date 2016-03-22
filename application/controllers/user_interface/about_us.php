<?php
class About_as extends CI_Controller
{
    public function index() {
        $this->load->model('user_interface/personal_area_model');
        $this->load->model('user_interface/profile_settings_model');
        $this->load->model('user_interface/main_model');

        if ($this->session->userdata('id')) {
            $user_id = $this->session->userdata('id');

            $data['new_messages'] = $this->personal_area_model->get_new_messages($user_id);
            $data['countries'] = $this->profile_settings_model->get_countries();

            $data['css'] = 'about_as';
            $data['gender'] = '';
            $data['login'] = 1;
            if ($this->session->userdata('gender')) {
                $data['gender'] = $this->session->userdata('gender');
            }

            if ($data['gender'] == 0 || $data['gender'] == 1) {
                $data['credits'] = $this->personal_area_model->user_credits($user_id);
            } else {
                $data['gifts'] = $this->personal_area_model->user_gifts($user_id);
            }
            $data['avatar'] = $this->main_model->get_avatar($user_id);
        }
        else {
            $data['css'] = 'about_us';
            $data['gender'] = 1;
            $data['login'] = 0;
        }

        $this->load->view('user_interface/header', $data);
        $this->load->view('user_interface/about_as');
        $this->load->view('user_interface/footer');
    }
}