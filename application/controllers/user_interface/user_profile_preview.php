<?php

class User_profile_preview extends CI_Controller
{
    public function index()
    {
        $this->load->model('user_interface/personal_area_model');
        $this->load->model('user_interface/my_profile_preview_model');

        if ($this->session->userdata('id')) {
            $my_id = $this->session->userdata('id');
            $user_id = $this->input->get('id');
            $data['all_data'] = $this->my_profile_preview_model->get_user_data($user_id);

            $this->load->helper('date');
            $datestring = '%j.%n.%Y';
            $today = mdate($datestring, time());
            $today_array = explode('.', $today);
            $today_days = ($today_array[2] * 365) + ($today_array[1] * 30) + $today_array[0];
            $birthday_array = explode('.', $data['all_data'][1][0]->birthday);
            $birthday_days = ($birthday_array[2] * 365) + ($birthday_array[1] * 30) + $birthday_array[0];
            $data['all_data'][1][0]->birthday = floor(($today_days - $birthday_days) / 365);

            $partner_age = explode('/', $data['all_data'][2][0]->age);
            $data['all_data'][2][0]->age = $partner_age[0] . ' - ' . $partner_age[1];

            $data['photos'] = $this->personal_area_model->get_photos($user_id);
            $data['avatar'] = $this->personal_area_model->get_avatar($my_id);
            $data['user_avatar'] = $this->personal_area_model->get_avatar($user_id);
            $data['id'] = $user_id;
            $data['new_messages'] = $this->personal_area_model->get_new_messages($my_id);

            $data['css'] = 'my_profile_preview';
            $data['gender'] = '';
            if ($this->session->userdata('gender')) {
                $data['gender'] = $this->session->userdata('gender');
            }

            if ($data['gender'] == 0 || $data['gender'] == 1) {
                $data['credits'] = $this->personal_area_model->user_credits($my_id);
            } else {
                $data['gifts'] = $this->personal_area_model->user_gifts($my_id);
            }
            $arr = array('height', 'weight', 'eyes_color', 'hair_color', 'children', 'about_me', 'drinking', 'smoking', 'age', 'partner_children', 'partner_drinking', 'partner_smoking', 'about_my_partner');
            foreach ($arr as $value) {
                foreach ($data['all_data'] as $k => $v) {
                    foreach ($v as $key => $val) {
                        if (isset($val, $val->$value) === TRUE) {
                            $data['all_data'][$k][$key]->$value = '<a href="#">Ask information</a>';
                        }
                    }
                }
            }

            $this->load->view('user_interface/header', $data);
            $this->load->view('user_interface/my_profile_preview');
            $this->load->view('user_interface/footer');
        }
    }
}