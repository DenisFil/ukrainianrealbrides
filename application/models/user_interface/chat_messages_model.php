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

        public function open_room($my_id, $partner_id)
        {
            $data = array('invite_status' => 1);
            $this->db->where('from_user_id', $partner_id);
            $this->db->where('to_user_id', $my_id);
            $query = $this->db->update('chat_invites', $data);
            return $query;
        }

        public function check_chat_status ($rooms)
        {
            $query = array();
            foreach ($rooms as $key => $value)
            {
                $query[$value['to_user_id']] = $this->db->  select('invite_status')->
                                            from('chat_invites')->
                                            where('from_user_id', $value['from_user_id'])->
                                            where('to_user_id', $value['to_user_id'])->
                                            get()->
                                            result();
            }
            return $query;
        }
    }