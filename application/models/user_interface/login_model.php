<?php
    class Login_model extends CI_Model
    {
        public function get_user_data ($email)
        {
            $query = $this->db->    select('id, password, name, lastname, gender')->
                                    from('user_profiles')->
                                    where('email', $email)->
                                    get()->
                                    result();
            return $query;
        }
    }