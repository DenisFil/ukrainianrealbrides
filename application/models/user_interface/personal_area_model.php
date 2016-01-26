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
                                    join('users', 'users.id=users_online.user_id')->
                                    where('last_online >', $time)->
                                    where('gender', 2)->
                                    get()->
                                    result();
            return count($query);
        }

        public function user_credits($id)
        {
            $query = $this->db->    select('credits')->
                                    from('men_details')->
                                    where('user_id', $id)->
                                    get()->
                                    result();
            return $query[0]->credits;
        }

        public function get_fotos($id)
        {
            $query = $this->db->    select('avatar, photos')->
                                    from('men_details')->
                                    where('user_id', $id)->
                                    get()->
                                    result();
            return $query;
        }
    }