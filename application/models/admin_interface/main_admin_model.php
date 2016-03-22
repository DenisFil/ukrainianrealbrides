<?php
    class Main_admin_model extends CI_Model
    {
        public function counts()
        {
            $counts = array(
                'all_profiles' => count($this->db-> select('id')->
                                                    from('user_profiles')->
                                                    get()->
                                                    result())
            );
            return $counts;
        }

        public function get_users_data()
        {
            $query = $this->db->    select('user_profiles.id, user_profiles.name, user_profiles.lastname, user_profiles.register_date, user_profiles.user_status, countries.country_name, user_details.agency, user_details.credits')->
                                    from('user_profiles')->
                                    join('user_details', 'user_details.user_id = user_profiles.id')->
                                    join('countries', 'countries.country_id = user_details.country')->
                                    get()->
                                    result();
            return $query;
        }

        public function get_profiles_data($user_status)
        {
            if ($user_status == 0)
            {
                $user_profiles_data = $this->db->   select('user_profiles.id, user_profiles.name, user_profiles.lastname, user_profiles.register_date, user_profiles.user_status, countries.country_name, user_details.agency, user_details.credits')->
                                                    from('user_profiles')->
                                                    join('user_details', 'user_details.user_id = user_profiles.id')->
                                                    join('countries', 'countries.country_id = user_details.country')->
                                                    where('user_profiles.user_status', 0)->
                                                    get()->
                                                    result();
            }
            elseif ($user_status == 1)
            {
                $user_profiles_data = $this->db->   select('user_profiles.id, user_profiles.name, user_profiles.lastname, user_profiles.register_date, user_profiles.user_status, countries.country_name, user_details.agency, user_details.credits')->
                                                    from('user_profiles')->
                                                    join('user_details', 'user_details.user_id = user_profiles.id')->
                                                    join('countries', 'countries.country_id = user_details.country')->
                                                    where('user_profiles.user_status', 1)->
                                                    get()->
                                                    result();
            }
            elseif ($user_status == 2)
            {
                $user_profiles_data = $this->db->   select('user_profiles.id, user_profiles.name, user_profiles.lastname, user_profiles.register_date, user_profiles.user_status, countries.country_name, user_details.agency, user_details.credits')->
                                                    from('user_profiles')->
                                                    join('user_details', 'user_details.user_id = user_profiles.id')->
                                                    join('countries', 'countries.country_id = user_details.country')->
                                                    where('user_profiles.user_status', 2)->
                                                    get()->
                                                    result();
            }
            elseif ($user_status == 3)
            {
                $user_profiles_data = $this->db->   select('user_profiles.id, user_profiles.name, user_profiles.lastname, user_profiles.register_date, user_profiles.user_status, countries.country_name, user_details.agency, user_details.credits')->
                                                    from('user_profiles')->
                                                    join('user_details', 'user_details.user_id = user_profiles.id')->
                                                    join('countries', 'countries.country_id = user_details.country')->
                                                    get()->
                                                    result();
            }
            else
            {
                $user_profiles_data = $this->db->   select('user_profiles.id, user_profiles.name, user_profiles.lastname, user_profiles.register_date, user_profiles.user_status, countries.country_name, user_details.agency, user_details.credits')->
                                                    from('user_profiles')->
                                                    join('user_details', 'user_details.user_id = user_profiles.id')->
                                                    join('countries', 'countries.country_id = user_details.country')->
                                                    where('user_profiles.user_status', 3)->
                                                    get()->
                                                    result();
            }
            return $user_profiles_data;
        }

        public function add_new_partner($data)
        {
            $query = $this->db->insert('partner_profiles', $data);
            return $query;
        }
    }