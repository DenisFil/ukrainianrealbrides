<?php
    class Main_model extends CI_Model
    {
        public function set_online($id)
        {
            $query = $this->db->    select('last_online')->
                                    from('users_online')->
                                    where('user_id', $id)->
                                    get()->
                                    result();
            $time['last_online'] = time() + (60 * 60 * 24 * 365);

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

        public function set_offline($id)
        {
            $this->db->update('users_online', array('last_online' => time()), array('user_id' => $id));
        }

        public function get_avatar($id)
        {
            $query = $this->db->    select('avatar')->
                                    from('user_details')->
                                    where('user_id', $id)->
                                    get()->
                                    result();
            if (!empty($query))
            {
                return $query[0]->avatar;
            }
        }
    }