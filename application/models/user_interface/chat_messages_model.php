<?php
    class Chat_messages_model extends CI_Model
    {
        public function users_online($gender)
        {
            if ($gender == 0 || $gender == 1)
            {
                $gender = 2;
            }
            else
            {
                $gender = 1;
            }

            $online = time() - 300;

            $query = $this->db->    select('user_profiles.name, user_profiles.lastname, user_profiles.id, user_details.avatar, user_details.credits, user_details.city, countries.country_name')->
                                    from('user_profiles')->
                                    join('user_details', 'user_profiles.id = user_details.user_id')->
                                    join('countries', 'countries.country_id = user_details.country')->
                                    join('users_online', 'users_online.user_id = user_profiles.id')->
                                    where('gender', $gender)->
                                    where('last_online >', $online)->
                                    get()->
                                    result();
            return $query;
        }
    }