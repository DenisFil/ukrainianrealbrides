<?php
    class Main_model extends CI_Model
    {
        public function online($id, $time)
        {
            $query = $this->db->    select('last_online')->
                                    from('users_online')->
                                    where('user_id', $id)->
                                    get()->
                                    result();
            if (!empty($query))
            {
                $this->db->update('users_online', $time, array('user_id' => $id));
            }
            else
            {
                $time['user_id'] = $id;
                $this->db->insert('users_online', $time);
            }
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
    }