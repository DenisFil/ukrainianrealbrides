<?php
    class Signup_model extends CI_Model
    {
        public function get_user_email($email)
        {
            $query = $this->db->    select('id')->
                                    from('users')->
                                    where('email', $email)->
                                    get()->
                                    result();
            return $query;
        }

        public function insert_new_user($user_data)
        {
            $query = $this->db->insert('users', $user_data);
            return $query;
        }
    }