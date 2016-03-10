<?php
    class Chat_engine extends CI_Controller
    {
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