<?php
    class Search_model extends CI_Model
    {
        public function first_get_profiles($gender)
        {
            if ($gender == 1 || $gender == 0)
            {
                $gender = 2;
            }
            else
            {
                $gender = 1;
            }

            $query = $this->db->    select('user_profiles.name, user_profiles.id, user_details.avatar, user_details.birthday, user_details.city, countries.country_name')->
                                    from('user_profiles')->
                                    join('user_details', 'user_details.user_id = user_profiles.id')->
                                    join('countries', 'countries.country_id=user_details.country')->
                                    where('gender', $gender)->
                                    get()->
                                    result();
            return $query;
        }

        public function search($data, $gender)
        {
            if ($gender == 1 || $gender == 0)
            {
                $gender = 2;
            }
            else
            {
                $gender = 1;
            }

            $query = $this->db->    select('user_profiles.name, user_profiles.id, user_details.avatar, user_details.birthday, user_details.city, countries.country_name')->
                                    from('user_profiles')->
                                    join('user_details', 'user_details.user_id = user_profiles.id')->
                                    join('countries', 'countries.country_id=user_details.country')->
                                    where('gender', $gender)->
                                    where('country_name', $data['country'])->
                                    get()->
                                    result();
            return $query;
        }
    }