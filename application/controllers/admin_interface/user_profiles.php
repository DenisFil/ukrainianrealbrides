<?php
    class User_profiles extends CI_Controller
    {
        public function __construct()
        {
            parent::__construct();

            $this->load->model('admin_interface/main_admin_model');
        }

        public function index()
        {
            $users_all_data['users_all_data'] = $this->main_admin_model->get_users_data();
            $this->load->helper('date');
            $time_string = '%j-%m-%Y %G:%i:%s';
            $all_profiles = count($users_all_data['users_all_data']);
            $active = 0;
            $anactive = 0;
            $locked = 0;
            for ($i = 0; $i < $all_profiles; $i++)
            {
                if ($users_all_data['users_all_data'][$i]->user_status == 0)
                {
                    $anactive += 1;
                }
                elseif ($users_all_data['users_all_data'][$i]->user_status == 1)
                {
                    $active += 1;
                }
                elseif ($users_all_data['users_all_data'][$i]->user_status == 2)
                {
                    $locked += 1;
                }
            }
            $counts = array(
                'all_profiles' => $all_profiles,
                'active' => $active,
                'anactive' => $anactive,
                'locked' => $locked
            );

            foreach ($users_all_data['users_all_data'] as $value)
            {
                if ($value->lastname == '')
                {
                    $name = $value->name;
                }
                else
                {
                    $name = $value->name . ' ' . $value->lastname;
                }
                $value->name = $name;
                unset($value->lastname);

                if ($value->agency == NULL)
                {
                    $value->agency = 'none';
                }
                $register_date = mdate($time_string, $value->register_date);
                $register_date = explode(' ', $register_date);
                $value->register_date = $register_date[0];
                $value->register_time = $register_date[1];

            }

            $this->load->view('admin_interface/header', $counts);
            $this->load->view('admin_interface/user_profiles', $users_all_data);
            $this->load->view('admin_interface/footer');
        }

        public function get_profiles_data()
        {
            $user_status = $this->input->post('user_status');
            $user_profiles = $this->main_admin_model->get_profiles_data($user_status);

            $this->load->helper('date');
            $time_string = '%j-%m-%Y %G:%i:%s';
            foreach ($user_profiles as $value)
            {
                if ($value->lastname == '')
                {
                    $name = $value->name;
                }
                else
                {
                    $name = $value->name . ' ' . $value->lastname;
                }
                $value->name = $name;
                unset($value->lastname);

                if ($value->agency == NULL)
                {
                    $value->agency = 'none';
                }
                $register_date = mdate($time_string, $value->register_date);
                $register_date = explode(' ', $register_date);
                $value->register_date = $register_date[0];
                $value->register_time = $register_date[1];

            }

            echo json_encode($user_profiles);
        }
        
        public function add_new_partner()
        {
            $data = $this->input->post();
            $query = $this->main_admin_model->add_new_partner($data);
            if ($query == TRUE)
            {
                $result['result'] = 1;
            }
            else
            {
                $result['result'] = 0;
            }
            echo json_encode($result);
        }
    }