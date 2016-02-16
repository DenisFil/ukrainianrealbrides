<?php
    class My_profile_preview_model extends CI_Model
    {
        public function get_user_data($id)
        {
            $query = array();
            array_push($query, $this->db->  select('country_name')->
                                            from('countries')->
                                            join('user_details', 'user_details.country=countries.country_id')->
                                            where('user_id', $id)->
                                            get()->
                                            result());

            array_push($query, $this->db->  select('height, weight, eyes_color, hair_color, children, about_me')->
                                            from('user_details')->
                                            where('user_id', $id)->
                                            get()->
                                            result());
            return $query;
        }
    }