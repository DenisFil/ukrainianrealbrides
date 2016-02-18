<?php
    class Personal_area_model extends CI_Model
    {
        public function get_new_messages($user_id)
        {
            $query = $this->db->    select('message_id')->
                                    from('private_messages')->
                                    where('recipient', $user_id)->
                                    where('have_read', 0)->
                                    get()->
                                    result();
            return count($query);
        }

        public function users_online($time)
        {
            $query = $this->db->    select('user_id')->
                                    from('users_online')->
                                    join('user_profiles', 'user_profiles.id=users_online.user_id')->
                                    where('last_online >', $time)->
                                    where('gender', 2)->
                                    get()->
                                    result();
            return count($query);
        }

        public function user_credits($id)
        {
            $query = $this->db->    select('credits')->
                                    from('user_details')->
                                    where('user_id', $id)->
                                    get()->
                                    result();
            return $query[0]->credits;
        }

        public function user_gifts($id)
        {
            $query = $this->db->    select()->
                                    from('user_gifts')->
                                    where('id_to', $id)->
                                    get()->
                                    result();
            return count($query);
        }

        public function get_avatar($id)
        {
            $query = $this->db->    select('avatar')->
                                    from('user_details')->
                                    where('user_id', $id)->
                                    get()->
                                    result();
            return $query[0]->avatar;
        }

        public function add_avatar($data)
        {
            $id = $data['user_id'];
            unset($data['user_id']);
            $query = $this->db->update('user_details', $data, array('user_id' => $id));
            return $query;
        }

        public function delete_avatar($id)
        {
            $this->db->update('user_details', array('avatar' => ''), array('user_id' => $id));
        }

        public function get_photos($id)
        {
            $query = $this->db->    select('photo_link')->
                                    from('user_photos')->
                                    where('user_id', $id)->
                                    get()->
                                    result();
            return $query;
        }

        public function add_photo($data)
        {
            $query = $this->db->insert('user_photos', $data);
        }

        public function delete_photo($photo)
        {
            $query = $this->db->delete('user_photos', array('photo_link' => $photo));
            return $query;
        }

        public function invite_friend($data)
        {
            $query = $this->db->insert('invites', $data);
            return $query;
        }
    }