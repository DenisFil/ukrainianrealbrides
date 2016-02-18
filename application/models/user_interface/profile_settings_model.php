<?php
    class Profile_settings_model extends CI_Model
    {
        public function get_user_data($id)
        {
            $query = array();
            array_push($query, $this->db->  select('name, lastname, gender, email, social_network')->
                                            from('user_profiles')->
                                            where('id', $id)->
                                            get()->
                                            result());
            array_push($query, $this->db->      select('birthday, country, city, height, weight, eyes_color, hair_color, children, religion, education, drinking, smoking, hobbies, about_me')->
                                                from('user_details')->
                                                where('user_id', $id)->
                                                get()->
                                                result());
            array_push($query, $this->db->  select('partner_children, partner_drinking, partner_smoking, about_my_partner')->
                                            from('about_my_partner')->
                                            where('user_id', $id)->
                                            get()->
                                            result());
            $country = $this->db->  select('country_name')->
                                    from('countries')->
                                    where('country_id', $query[1][0]->country)->
                                    get()->
                                    result();
            if (!empty($country))
            {
                $query[1][0]->country = $country[0]->country_name;
            }
            else
            {
                $query[1][0]->country = '';
            }
            array_push($query, $this->db->  select('news, messages, promo')->
                                            from('notifications')->
                                            where('user_id', $id)->
                                            get()->
                                            result());

            return $query;
        }

        public function get_user_data_age($id)
        {
            $query = $this->db->    select('age')->
                                    from('about_my_partner')->
                                    where('user_id', $id)->
                                    get()->
                                    result();
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

        public function insert_general_data($data, $id)
        {
            $query_partner = $this->db->    select()->
                                            from('about_my_partner')->
                                            where('user_id', $id)->
                                            get()->
                                            result();
            if (empty($query_partner))
            {
                $this->db->insert('about_my_partner', array('user_id' => $id));
            }

            $country = $this->db->  select('country_id')->
                                    from('countries')->
                                    where('country_name', $data['country'])->
                                    get()->
                                    result();
            $data_details = array(
                'birthday' => $data['birthday'],
                'country' => $country[0]->country_id,
                'city' => $data['city']
            );

            if ($data['gender'] == 'Male')
            {
                $data['gender'] = 1;
            }
            else
            {
                $data['gender'] = 2;
            }

            unset($data['birthday'], $data['country'], $data['city']);
            $query_profile = $this->db->update('user_profiles', $data, array('id' => $id));
            $query_details = $this->db->update('user_details', $data_details, array('user_id' => $id));

            if ($query_profile === TRUE && $query_details === TRUE)
            {
                return TRUE;
            }
            else
            {
                return FALSE;
            }
        }

        public function insert_personal_data($data, $id)
        {
            $query = $this->db->update('user_details', $data, array('user_id' => $id));
            return $query;
        }

        public function insert_background_data($data, $id)
        {
            $query = $this->db->update('user_details', $data, array('user_id' => $id));
            return $query;
        }

        public function insert_partner_data($data, $id)
        {
            $first_query = $this->db->  select()->
                                        from('about_my_partner')->
                                        where('user_id', $id)->
                                        get()->
                                        result();
            if (!empty($first_query))
            {
                $query = $this->db->update('about_my_partner', $data, array('user_id' => $id));
            }
            else
            {
                $data['user_id'] = $id;
                $query = $this->db->insert('about_my_partner', $data);
            }
            return $query;
        }

        public function change_email($data, $id)
        {
            $query_data = $this->db->   select()->
                                        from('change_data')->
                                        where('user_id', $id)->
                                        get()->
                                        result();
            if (empty($query_data))
            {
                $data['user_id'] = $id;
                $query = $this->db->insert('change_data', $data);
            }
            else
            {
                $query = $this->db->update('change_data', $data, array('user_id' => $id));
            }

            $confirm_data = array(
                'confirm_hash' => md5(time() . $id),
                'email_status' => 0
            );
            $query_confirm_email = $this->db->update('confirm_email', $confirm_data, array('user_id' => $id));

            if ($query === TRUE && $query_confirm_email === TRUE)
            {
                return $confirm_data['confirm_hash'];
            }
        }

        public function change_password($password, $id)
        {
            $query = $this->db->update('user_profiles', $password, array('id' => $id));
            return $query;
        }

        public function notifications ($notifications, $id)
        {
            $query = $this->db->update('notifications', $notifications, array('user_id' => $id));
            return $query;
        }
    }