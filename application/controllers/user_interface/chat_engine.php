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
        foreach ($users_online_query as $value) {
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
        $invite_code['invite_code'] = $invite_data['invite_code'];
        echo json_encode($invite_code);
    }

    public function check_invites_chat()
    {
        $invites_data = $this->chat_messages_model->check_invites_chat($this->session->userdata('id'));

        echo json_encode($invites_data);
    }

    public function check_credits()
    {
        $gender = $this->session->userdata('gender');
        if ($gender == 1) {
            $credits = $this->chat_messages_model->check_credits($this->session->userdata('id'));
            if ($credits > 0) {
                $result['result'] = 1;
            } else {
                $result['result'] = 0;
            }
        } else {
            $result['result'] = 1;
        }

        echo json_encode($result);
    }

    public function open_room()
    {
        $open_room = $this->chat_messages_model->open_room($this->input->post('invite_code'));
        if ($open_room === TRUE) {
            $result['result'] = 1;
        } else {
            $result['result'] = 0;
        }
        echo json_encode($result);
    }

    public function check_life_status()
    {
        $invite_codes = $this->input->post('rooms');
        $chat_life = $this->chat_messages_model->check_life_status($invite_codes);
        echo json_encode($chat_life);
    }

    public function get_invite_code()
    {
        $partner_id = $this->input->post('partner_id');
        $invite_code['invite_code'] = $this->chat_messages_model->get_invite_code($partner_id, $this->session->userdata('id'));
        echo json_encode($invite_code);
    }

    public function write_off_credits()
    {
        if ($this->session->userdata('gender') == 1) {
            $credits = $this->input->post('credits');
            $new_credits['credits'] = $this->chat_messages_model->write_off_credits($this->session->userdata('id'), $credits);
            echo json_encode($new_credits);
        }
    }

    public function close_room()
    {
        $close = $this->chat_messages_model->close_room($this->input->post('invite_code'));
        if ($close === TRUE) {
            $result['result'] = 1;
        } else {
            $result['result'] = 0;
        }
        echo json_encode($result);
    }

    public function check_chat_status()
    {
        $rooms = $this->input->post('rooms');
        foreach ($rooms as $key => $value) {
            $rooms[$key] = array('from_user_id' => $this->session->userdata('id'), 'to_user_id' => $value);
        }
        $chats_status = $this->chat_messages_model->check_chat_status($rooms);
        echo json_encode($chats_status);
    }

    public function send_message()
    {
        $time = time();
        $this->load->helper('date');

        $message_data = $this->input->post();
        $message_data['from_user_id'] = $this->session->userdata('id');

        $date_string = '%j %F %Y %G:%i:%s';
        $date['date'] = mdate($date_string, $time);
        $message_data['date'] = $date['date'];
        $this->chat_messages_model->send_message($message_data);

        echo json_encode($date);
    }

    public function check_new_messages()
    {
        $partner_ids = $this->input->post();
        $new_messages = $this->chat_messages_model->check_new_messages($this->session->userdata('id'), $partner_ids);

        echo json_encode($new_messages);
    }
    
    public function read_message()
    {
        $this->chat_messages_model->read_message($this->input->post('message_id'));
    }

    public function load_history()
    {
        $data = $this->input->post('partner_id');
        $query_history = $this->chat_messages_model->load_history($data, $this->session->userdata('id'));
        $history = array();
        foreach ($query_history as $value) {
            $count = count($value);
            for ($i = 0; $i < $count; $i++) {
                array_push($history, $value[$i]);
            }
        }
        foreach ($history as $value) {
            $value->date = strtotime($value->date);
        }

        for ($i = count($history); $i >= 0; $i--) {
            foreach ($history as $key => $value) {
                if ($key + 1 < count($history)){
                    if ($history[$key + 1]->date < $history[$key]->date) {
                        list($history[$key], $history[$key + 1]) = array($history[$key + 1], $history[$key]);
                    }
                }
            }
        }
        $history = array_reverse($history);
        $this->load->helper('date');
        foreach ($history as $value) {
            $time_string = '%j %F %Y %G:%i:%s';
            $value->date = mdate($time_string, $value->date);
        }
        echo json_encode(array_reverse($history));
    }
}