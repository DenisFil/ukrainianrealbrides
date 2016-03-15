<?php
    class Chat_engine extends CI_Controller
    {
        public function __construct()
        {
            parent::__construct();

            $this->load->model('user_interface/chat_messages_model');
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

        public function check_invites_chat()
        {
            $invites_data = $this->chat_messages_model->check_invites_chat($this->session->userdata('id'));

            echo json_encode($invites_data);
        }

        public function open_room()
        {
            $open_room = $this->chat_messages_model->open_room($this->session->userdata('id'), $this->input->post('partner_id'));
            if ($open_room === TRUE)
            {
                $result['result'] = 1;
            }
            else
            {
                $result['result'] = 0;
            }
            echo json_encode($result);
        }

        public function check_chat_status()
        {
            $rooms = $this->input->post('rooms');
            foreach ($rooms as $key => $value)
            {
                $rooms[$key] = array('from_user_id' => $this->session->userdata('id'), 'to_user_id' => $value);
            }
            $chats_status = $this->chat_messages_model->check_chat_status($rooms);
            echo json_encode($chats_status);
        }

        public function send_message()
        {
            $message_data = $this->input->post();
            $message_data['from_user_id'] = $this->session->userdata('id');
            $this->chat_messages_model->send_message($message_data);
        }

        public function check_new_messages()
        {
            $from_user_id = $this->input->post('from_user_id');
            $new_messages = $this->chat_messages_model->check_new_messages($this->session->userdata('id'), $from_user_id);
            $message_time = explode(' ', $new_messages[0]->date);
            $new_messages[0]->date_message = $message_time[0];
            $new_messages[0]->time_message = $message_time[1];

            echo json_encode($new_messages);
        }
    }