<?php
    class Search_model extends CI_Model
    {
        public function get_cities()
        {
            $query = $this->db->    select('city')->
                                    from('user_details')->
                                    get()->
                                    result();
            return $query;
        }

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

            if ($data['id'] != '')
            {
                $query = $this->db->    select('user_profiles.name, user_profiles.id, user_details.avatar, user_details.birthday, user_details.city, countries.country_name')->
                                        from('user_profiles')->
                                        join('user_details', 'user_details.user_id = user_profiles.id')->
                                        join('countries', 'countries.country_id=user_details.country')->
                                        where('id', $data['id'])->
                                        get()->
                                        result();

                return $query;
            }
            else
            {
                $this->db->     select('user_profiles.name, user_profiles.id, user_details.avatar, user_details.birthday, user_details.city, countries.country_name')->
                                from('user_profiles')->
                                join('user_details', 'user_details.user_id = user_profiles.id')->
                                join('countries', 'countries.country_id=user_details.country')->
                                where('gender', $gender);
                if ($data['country'])
                {
                    $this->db->where('country_name', $data['country']);
                }

                $query = $this->db->    get()->
                                        result();
                return $query;
            }
        }

        public function full_search($data, $gender)
        {
            if ($gender == 1 || $gender == 0)
            {
                $gender = 2;
            }
            else
            {
                $gender = 1;
            }

            if ($data['id'] != '')
            {
                $query = $this->db->    select('user_profiles.name, user_profiles.id, user_details.avatar, user_details.birthday, user_details.city, countries.country_name')->
                                        from('user_profiles')->
                                        join('user_details', 'user_details.user_id = user_profiles.id')->
                                        join('countries', 'countries.country_id=user_details.country')->
                                        where('id', $data['id'])->
                                        get()->
                                        result();

                return $query;
            }
            else
            {
                $this->db-> select('user_profiles.name, user_profiles.id, user_details.avatar, user_details.birthday, user_details.weight, user_details.city, user_details.height, countries.country_name')->
                            from('user_profiles')->
                            join('user_details', 'user_details.user_id = user_profiles.id')->
                            join('countries', 'countries.country_id=user_details.country')->
                            where('gender', $gender);

                if ($data['country'])
                {
                    $this->db->where('country_name', $data['country']);
                }
                if ($data['name'])
                {
                    $this->db->where('name', $data['name']);
                }
                if ($data['city'])
                {
                    $this->db->where('city', $data['city']);
                }
                if ($data['eyes_color'])
                {
                    $this->db->where('eyes_color', $data['eyes_color']);
                }
                if ($data['children'])
                {
                    $this->db->where('children', $data['children']);
                }
                if ($data['religion'])
                {
                    $this->db->where('religion', $data['religion']);
                }
                if ($data['hair_color'])
                {
                    $this->db->where('hair_color', $data['hair_color']);
                }
                $query = $this->db->    get()->
                                        result();
                return $query;
            }
        }
    }