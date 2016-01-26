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
    }