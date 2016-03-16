<?php
    class Chat_messages_model extends CI_Model
    {
        public function users_online($gender)
        {
            if ($gender == 0 || $gender == 1)
            {
                $gender = 2;
            }
            else
            {
                $gender = 1;
            }

            $online = time();

            $query = $this->db->    select('user_profiles.name, user_profiles.lastname, user_profiles.id, user_details.avatar, user_details.credits, user_details.city, countries.country_name')->
                                    from('user_profiles')->
                                    join('user_details', 'user_profiles.id = user_details.user_id')->
                                    join('countries', 'countries.country_id = user_details.country')->
                                    join('users_online', 'users_online.user_id = user_profiles.id')->
                                    where('gender', $gender)->
                                    where('last_online >', $online)->
                                    get()->
                                    result();
            return $query;
        }

        public function invite_to_chat ($data)
        {
            $this->db->insert('chat_invites', $data);
        }

        public function check_invites_chat($id)
        {
            $query = $this->db->    select('from_user_id')->
                                    from('chat_invites')->
                                    where('to_user_id', $id)->
                                    where('invite_status', 2)->
                                    get()->
                                    result();
            if (!empty($query))
            {
                $invites_data = array();
                foreach ($query as $value)
                {
                    $data = $this->db-> select('user_profiles.name, user_profiles.id, user_details.avatar')->
                                        from('user_profiles')->
                                        join('user_details', 'user_details.user_id = user_profiles.id')->
                                        where('id', $value->from_user_id)->
                                        get()->
                                        result();
                    array_push($invites_data, $data[0]);
                }
                return $invites_data;
            }
        }

        public function check_credits($id)
        {
            $query = $this->db->    select('credits')->
                                    from('user_details')->
                                    where('user_id', $id)->
                                    get()->
                                    result();
            return $query[0]->credits;
        }

        public function open_room($my_id, $partner_id)
        {
            $data = array('invite_status' => 1);
            $this->db->where('from_user_id', $partner_id);
            $this->db->where('to_user_id', $my_id);
            $query = $this->db->update('chat_invites', $data);
            return $query;
        }

        public function close_room($invite_code)
        {
            $query = $this->db->update('chat_invites', array('invite_status' => 0), array('invite_code' => $invite_code));
            return $query;
        }

        public function check_chat_status ($rooms)
        {
            $query = array();
            foreach ($rooms as $key => $value)
            {
                $query[$value['to_user_id']] = $this->db->  select('invite_status, invite_code')->
                                                            from('chat_invites')->
                                                            where('from_user_id', $value['from_user_id'])->
                                                            where('to_user_id', $value['to_user_id'])->
                                                            get()->
                                                            result();
            }
            return $query;
        }

        public function get_invite_code($partner_id, $my_id)
        {
            $query = $this->db->    select('invite_code')->
                                    from('chat_invites')->
                                    where('from_user_id', $partner_id)->
                                    where('to_user_id', $my_id)->
                                    get()->
                                    result();
            return $query[0]->invite_code;
        }

        public function send_message ($data)
        {
            $this->db->insert('chat_messages', $data);
        }

        public function check_new_messages($id, $from_user_id)
        {
            $query = $this->db->    select('message_id, message, date')->
                                    from('chat_messages')->
                                    where('to_user_id', $id)->
                                    where('status', 0)->
                                    where('from_user_id', $from_user_id)->
                                    get()->
                                    result();
            foreach ($query as $value)
            {
                $this->db->update('chat_messages', array('status' => 1), array('message_id' => $value->message_id));
            }
            return $query;
        }

        public function load_history($id, $my_id)
        {
            $query = array();
            array_push($query, $this->db->  select('message, date, from_user_id')->
                                            from('chat_messages')->
                                            where('from_user_id', $my_id)->
                                            where('to_user_id', $id)->
                                            get()->
                                            result());
            array_push($query, $this->db->  select('message, date, status, from_user_id')->
                                            from('chat_messages')->
                                            where('from_user_id', $id)->
                                            where('to_user_id', $my_id)->
                                            get()->
                                            result());
            return $query;
        }
    }