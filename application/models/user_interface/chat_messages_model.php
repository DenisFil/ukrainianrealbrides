<?php
    class Chat_messages_model extends CI_Model
    {
        public function get_messages($id)
        {
            $query = $this->db->    select('from_id, message')->
                                    from('chat_messages')->
                                    where('to_id', $id)->
                                    get()->
                                    result();
            return $query;
        }
    }