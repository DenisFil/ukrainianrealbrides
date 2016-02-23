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

            array_push($query, $this->db->  select('height, weight, eyes_color, hair_color, children, about_me,birthday, drinking, smoking')->
                                            from('user_details')->
                                            where('user_id', $id)->
                                            get()->
                                            result());
            array_push($query, $this->db->  select('age, partner_children, partner_drinking, partner_smoking, about_my_partner')->
                                            from('about_my_partner')->
                                            where('user_id', $id)->
                                            get()->
                                            result());
            array_push($query, $this->db->  select('name, lastname')->
                                            from('user_profiles')->
                                            where('id', $id)->
                                            get()->
                                            result());
            return $query;
        }
    }