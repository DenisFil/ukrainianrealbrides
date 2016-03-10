<?php
    class Chat extends MY_Controller
    {
        public function __construct()
        {
            parent::__construct();

            $this->load->model('user_interface/chat_messages_model');
        }

        public function index()
        {
            $this->load->model('user_interface/personal_area_model');
            $this->load->model('user_interface/profile_settings_model');
            $this->load->model('user_interface/main_model');

            if ($this->session->userdata('id'))
            {
                $user_id = $this->session->userdata('id');

                $data['new_messages'] = $this->personal_area_model->get_new_messages($user_id);
                $data['users_online'] = $this->personal_area_model->users_online(time());

                $data['css'] = 'chat';
                $data['gender'] = '';
                if ($this->session->userdata('gender'))
                {
                    $data['gender'] = $this->session->userdata('gender');
                }

                if ($data['gender'] == 0 || $data['gender'] == 1)
                {
                    $data['credits'] = $this->personal_area_model->user_credits($user_id);
                }
                else
                {
                    $data['gifts'] = $this->personal_area_model->user_gifts($user_id);
                }
                $data['avatar'] = $this->main_model->get_avatar($user_id);

                $users_online = array('users_online' => $this->chat_messages_model->users_online($this->session->userdata('gender')));

                $this->load->view('user_interface/header', $data);
                $this->load->view('user_interface/chat', $users_online);
                $this->load->view('user_interface/footer');
            }
        }

        public function users_online()
        {
            $users_online_query = $this->chat_messages_model->users_online($this->session->userdata('gender'));
            $users_online = array();
            foreach ($users_online_query as $value)
            {
                $users_online[$value->id] = $value;
            }

            echo json_encode($users_online);
        }

        public function invite_to_chat()
        {
            $invite_data = array(
                'to_user_id' => $this->input->post('to_user_id'),
                'from_user_id' => $this->session->userdata('id'),
                'invite_code' => md5(time() + $this->input->post('to_user_id'))
            );

            $this->chat_messages_model->invite_to_chat($invite_data);
        }

        public function check_invites_chat ()
        {
            $invites_data = $this->chat_messages_model->check_invites_chat($this->session->userdata('id'));

            echo json_encode($invites_data);
        }
    }