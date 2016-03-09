<?php
    class Search extends MY_Controller
    {
        public function __construct()
        {
            parent::__construct();

            $this->load->model('user_interface/search_model');
        }

        public function index()
        {
            $this->load->model('user_interface/personal_area_model');
            $this->load->model('user_interface/profile_settings_model');
            $this->load->model('user_interface/main_model');

            if ($this->session->userdata('id'))
            {
                $user_id = $this->session->userdata('id');

                $data['new_messages'] = $this->personal_area_model->get_new_messages($user_id);
                $data['users_online'] = $this->personal_area_model->users_online(time());
                $data['countries'] = $this->profile_settings_model->get_countries();

                $data['css'] = 'search';
                $data['gender'] = '';
                if ($this->session->userdata('gender'))
                {
                    $data['gender'] = $this->session->userdata('gender');
                }

                if ($data['gender'] == 0 || $data['gender'] == 1)
                {
                    $data['credits'] = $this->personal_area_model->user_credits($user_id);
                }
                else
                {
                    $data['gifts'] = $this->personal_area_model->user_gifts($user_id);
                }
                $data['avatar'] = $this->main_model->get_avatar($user_id);

                $this->load->view('user_interface/header', $data);
                $this->load->view('user_interface/search');
                $this->load->view('user_interface/footer');
            }
        }

        public function cities()
        {
            $query_cities = $this->search_model->get_cities();
            $cities = array('cities' => array());
             foreach ($query_cities as $value)
             {
                 if ($value->city != NULL)
                 {
                     var_dump('hello');
                     $search = array_search($value->city, $cities);
                     if ($search === FALSE)
                     {
                         array_push($cities['cities'], $value->city);
                     }
                 }
             }
            echo json_encode($cities);
        }

        public function first_get_profiles()
        {
            $first_result = $this->search_model->first_get_profiles($this->session->userdata('gender'));
                if ($first_result[0]->birthday != 0)
                {
                    $this->load->helper('date');

                    foreach ($first_result as $key => $value)
                    {
                        $age = explode('.', $first_result[$key]->birthday);
                        $birthday_days = ($age[2]*365) + ($age[1]*30) + $age[0];
                        $datestring = '%j.%n.%Y';
                        $today = mdate($datestring, time());
                        $today = explode('.', $today);
                        $today_days = ($today[2]*365) + ($today[1]*30) + $today[0];
                        $first_result[$key]->birthday = floor(($today_days - $birthday_days)/365);
                    }
                }
            shuffle($first_result);
            echo json_encode($first_result);
        }

        private function age($data)
        {
            foreach ($data as $value)
            {
                $this->load->helper('date');

                $date_string = '%j.%n.%Y';
                $today = mdate($date_string, time());
                $today = explode('.', $today);
                $today_days = ($today[2] * 365) + ($today[1] * 30) + $today[0];
                $birthday = explode('.', $value->birthday);
                $birthday_days = ($birthday[2] * 365) + ($birthday[1] * 30) + $birthday[0];
                $value->birthday = floor(($today_days - $birthday_days) / 365);
            }
            return $data;
        }

        public function search()
        {
            $search_data = $this->input->post();
            $search_query = $this->search_model->search($search_data, $this->session->userdata('gender'));
            $search_result = array();
            if ($search_data['id'] != '')
            {
                $search_result = $this->age($search_query);
                echo json_encode($search_result);
            }
            else
            {
                $search_query = $this->age($search_query);
                foreach ($search_query as $key => $value) {

                    if ($value->birthday < $search_data['from'] || $value->birthday > $search_data['to']) {
                        unset($search_query[$key]);
                    }
                }

                foreach ($search_query as $value) {
                    array_push($search_result, $value);
                }
                echo json_encode($search_result);
            }
        }

        public function full_search()
        {
            $search_data = $this->input->post();
            $search_query = $this->search_model->full_search($search_data, $this->session->userdata('gender'));
            if ($search_data['id'] != '')
            {
                $search_result = $this->age($search_query);
                echo json_encode($search_result);
            }
            else
            {
                $search_query = $this->age($search_query);
                foreach ($search_query as $key => $value)
                {
                    $weight = explode(' ', $value->weight);
                    $weight_from = explode(' ', $search_data['weight_from']);
                    $weight_to = explode(' ', $search_data['weight_to']);
                    if ($weight[0] < $weight_from[0] || $weight[0] > $weight_to[0])
                    {
                        unset($search_query[$key]);
                    }

                    $height = explode(' ', $value->height);
                    $height_from = explode(' ', $search_data['height_from']);
                    $height_to = explode(' ', $search_data['height_to']);
                    if ($height[0] < $height_from[0] || $height[0] > $height_to[0])
                    {
                        unset($search_query[$key]);
                    }
                }
                echo json_encode($search_query);
            }
        }
    }