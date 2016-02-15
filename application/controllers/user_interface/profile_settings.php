<?php
    class Profile_settings extends CI_Controller
    {
        public function __construct()
        {
            parent::__construct();

            $this->load->model('user_interface/profile_settings_model');
        }

        public function index()
        {
            if ($this->session->userdata('id'))
            {
                $user_id = $this->session->userdata('id');
                $this->load->model('user_interface/personal_area_model');
                
                $data['new_messages'] = $this->personal_area_model->get_new_messages($user_id);
                $data['users_online'] = $this->personal_area_model->users_online(time());
                $data['credits'] = $this->personal_area_model->user_credits($user_id);
                $data['css'] = 'profile_settings';
                $data['countries'] = $this->profile_settings_model->get_countries();
                $data['gender'] = '';
                if ($this->session->userdata('gender'))
                {
                    $data['gender'] = $this->session->userdata('gender');
                }

                $this->load->view('user_interface/header', $data);
                $this->load->view('user_interface/profile_settings');
                $this->load->view('user_interface/footer');
            }
        }

        public function user_data()
        {
            $user_id = $this->session->userdata('id');
            $user_data = $this->profile_settings_model->get_user_data($user_id);
            $user_data[1][0]->birthday = explode('.', $user_data[1][0]->birthday);

            echo json_encode($user_data);
        }

        public function user_data_age()
        {
            $partner_age = $this->profile_settings_model->get_user_data_age($this->session->userdata('id'));
            $partner_age = explode('/', $partner_age[0]->age);
            echo json_encode($partner_age);
        }

        public function insert_general_data()
        {
            $data = $this->input->post();
            $query = $this->profile_settings_model->insert_general_data($data, $this->session->userdata('id'));

            if ($query === TRUE)
            {
                $result['result'] = 1;
            }
            else
            {
                $result['result'] = 0;
            }
            echo json_encode($result);
        }

        public function insert_personal_data()
        {
            $data = $this->input->post();
            $query = $this->profile_settings_model->insert_personal_data($data, $this->session->userdata('id'));

            if ($query === TRUE)
            {
                $result['result'] = 1;
            }
            else
            {
                $result['result'] = 0;
            }
            echo json_encode($result);
        }

        public function insert_background_data()
        {
            $data = $this->input->post();
            $query = $this->profile_settings_model->insert_background_data($data, $this->session->userdata('id'));

            if ($query === TRUE)
            {
                $result['result'] = 1;
            }
            else
            {
                $result['result'] = 0;
            }
            echo json_encode($result);
        }

        public function insert_partner_data()
        {
            $data = $this->input->post();
            $query = $this->profile_settings_model->insert_partner_data($data, $this->session->userdata('id'));

            if ($query === TRUE)
            {
                $result['result'] = 1;
            }
            else
            {
                $result['result'] = 0;
            }
            echo json_encode($result);
        }

        public function change_email()
        {
            $new_email = $this->input->post();
            $query = $this->profile_settings_model->change_email($new_email, $this->session->userdata('id'));
            if ($query === TRUE)
            {
                $result['result'] = 1;
            }
            else
            {
                $result['result'] = 0;
            }
            echo json_encode($result);
        }
    }