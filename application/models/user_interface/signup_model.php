<?php
    class Signup_model extends CI_Model
    {
        public function get_user_email($email)
        {
            $query = $this->db->    select('id')->
                                    from('user_profiles')->
                                    where('email', $email)->
                                    get()->
                                    result();
            return $query;
        }

        public function insert_new_user($user_data)
        {
            //Сортировка данных
            $email_data['confirm_hash'] = $user_data['email_hash'];
            unset($user_data['email_hash']);
            $invite = $user_data['invite'];
            unset($user_data['invite']);
            $query = $this->db->insert('user_profiles', $user_data);

            //Получение ID нового юзера
            $user_id = $this->db->    select('id')->
                                      from('user_profiles')->
                                      where('email', $user_data['email'])->
                                      get()->
                                      result();

            //Запись данных для подтверждения email`a
            $email_data['user_id'] = $user_id[0]->id;
            $query_email = $this->db->insert('confirm_email', $email_data);
            $query_notifications = $this->db->insert('notifications', array('user_id' => $user_id[0]->id));
                if ($invite != '')
                {
                    //Запись бонусов по кредитам для пригласившего и приглашенного
                    $from_user_id = $this->db-> select('invite_from_user')->
                                                from('invites')->
                                                where('invite_code', $invite)->
                                                get()->
                                                result();
                    $get_from_credits = $this->db-> select('credits')->
                                                    from('men_details')->
                                                    where('user_id', $from_user_id[0]->invite_from_user)->
                                                    get()->
                                                    result();
                    $credits = $get_from_credits[0]->credits + 100;

                    $query_credits = $this->db->insert('men_details', array('user_id' => $user_id[0]->id, 'credits' => 50));
                    $this->db->update('men_details', array('credits' => $credits), array('user_id' => $from_user_id[0]->invite_from_user));
                    $query_invite = $this->db->update('invites', array('user_id' => $user_id[0]->id), array('invite_code' => $invite));
                }
                else
                {
                    $query_credits = $this->db->insert('men_details', array('user_id' => $user_id[0]->id, 'credits' => 0));
                }

                if ($query && $query_email && $query_credits === TRUE)
                {
                    return TRUE;
                }
                else
                {
                    return FALSE;
                }
        }

        public function insert_new_user_from_social_network($user_data)
        {
            $query = $this->db->insert('user_profiles', $user_data);

            $user_id = $this->db->  select('id')->
                                    from('user_profiles')->
                                    where('email', $user_data['email'])->
                                    get()->
                                    result();
            $email_data['user_id'] = $user_id[0]->id;
            $email_data['email_status'] = 1;
            $query_email = $this->db->insert('confirm_email', $email_data);
            $query_credits = $this->db->insert('men_details', array('user_id' => $user_id[0]->id, 'credits' => 0));
            $query_notifications = $this->db->insert('notifications', array('user_id' => $user_id[0]->id));
                if ($query && $query_email && $query_credits === TRUE && $query_notifications == TRUE)
                {
                    return TRUE;
                }
                else
                {
                    return FALSE;
                }
        }

        public function confirm_email($hash)
        {
            $data['email_status'] = 1;
            $query = $this->db->update('confirm_email', $data, array('confirm_hash' => $hash));

            $query_user_id = $this->db->    select('user_id')->
                                            from('confirm_email')->
                                            where('confirm_hash', $hash)->
                                            get()->
                                            result();
            $query_new_email = $this->db->  select('email')->
                                            from('change_data')->
                                            where('user_id', $query_user_id[0]->user_id)->
                                            get()->
                                            result();
            if ($query_new_email)
            {
                $update_data = array('email' => $query_new_email[0]->email);
                $update_email = $this->db->update('user_profiles', $update_data, array('id' => $query_user_id[0]->user_id));
                if ($query === TRUE && $update_email === TRUE)
                {
                    return TRUE;
                }
                else
                {
                    return FALSE;
                }
            }
            else
            {
                return $query;
            }
        }

        public function uniqueness_email($email)
        {
            $query = $this->db->    select('id')->
                                    from('user_profiles')->
                                    where('email', $email)->
                                    get()->
                                    result();
            if (count($query) > 0)
            {
                return FALSE;
            }
            else
            {
                return TRUE;
            }
        }
    }