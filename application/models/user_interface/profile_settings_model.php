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

        public function insert_data($data, $id)
        {
            if ($data['gender'] == 'Male')
            {
                $data['gender'] = 1;
            }
            else
            {
                $data['gender'] = 2;
            }

            $country_id = $this->db->   select('country_id')->
                                        from('countries')->
                                        where('country_name', $data['country'])->
                                        get()->
                                        result();

            $general_data = array(
                'name' => $data['name'],
                'lastname' => $data['lastname'],
                'gender' => $data['gender']
            );

            $other_data = array(
                'birthday' => $data['birthday'],
                'country' => $country_id[0]->country_id
            );

            $general_query = $this->db->update('user_profiles', $general_data, array('id' => $id));
            $other_query = $this->db->update('men_details', $other_data, array('user_id' => $id));
                if ($general_query === TRUE && $other_query === TRUE)
                {
                    return TRUE;
                }
                else
                {
                    return FALSE;
                }
        }
    }