<?php
    class Profile_settings_model extends CI_Model
    {
        public function get_user_data($id)
        {
            $query = array();
            array_push($query, $this->db->  select('name, lastname, gender')->
                                            from('user_profiles')->
                                            where('id', $id)->
                                            get()->
                                            result());
            array_push($query, $this->db->      select('birthday, country')->
                                                from('men_details')->
                                                where('user_id', $id)->
                                                get()->
                                                result());
            return $query;
        }

        public function get_countries()
        {
            $query = $this->db->    select('country_name')->
                                    from('countries')->
                                    get()->
                                    result();
            return $query;
        }
    }