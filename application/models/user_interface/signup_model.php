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
            $email_data['confirm_hash'] = $user_data['email_hash'];
            unset($user_data['email_hash']);
            $query = $this->db->insert('users', $user_data);

            $user_id = $this->db->    select('id')->
                                      from('users')->
                                      where('email', $user_data['email'])->
                                      get()->
                                      result();
            $email_data['user_id'] = $user_id[0]->id;
            $query_email = $this->db->insert('confirm_email', $email_data);
                if ($query && $query_email === TRUE)
                {
                    return TRUE;
                }
                else
                {
                    return FALSE;
                }
        }

        public function confirm_email($hash)
        {
            $data['email_status'] = 1;
            $query = $this->db->update('confirm_email', $data, array('confirm_hash' => $hash));
            return $query;
        }
    }