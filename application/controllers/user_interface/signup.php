<?php
    class Signup extends CI_Controller
    {
        public function __construct()
        {
            parent::__construct();

            $this->load->model('user_interface/signup_model');
            $this->load->model('user_interface/login_model');
        }

//  Валидация данных формы и запись нового пользователя
        public function index()
        {
            $user_data = $this->input->post();
            $this->load->library('form_validation');
            $rules = array(
                array('field' => 'name', 'rules' => 'required|min_length[3]|max_length[20]|alpha|trim'),
                array('field' => 'email', 'rules' => 'required|trim'),
                array('field' => 'password', 'rules' => 'required|min_length[3]|max_length[20]|alpha_numeric|trim')
            );
            $this->form_validation->set_rules($rules);
            $validation_result = $this->form_validation->run($user_data);
                if ($validation_result === TRUE)
                {
                    $user_data['password'] = md5($user_data['password']);
                    $user_data['register_date'] = time();
                    $user_data['email_hash'] = md5(time() . $user_data['name']);
                    $query = $this->signup_model->insert_new_user($user_data);
                    if ($query === TRUE)
                    {
//                        Отправка письма с подтверждением email`a
                        $this->load->library('email');
                        $this->email->from('info@ukrainianrealbrides.com', 'Ukrainian Real Brides');
                        $this->email->to($user_data['email']);
                        $this->email->subject('Thanks for signing up! Please confirm email to start communication.');
                        $this->email->message('Hello!
Please follow the link below to finish your registration at ukrainianrealbrides.com. Click here: ' . base_url() . 'user_interface/signup/confirm_email?email_hash=' . $user_data['email_hash']);
                        $this->email->send();

                        $result['result'] = 1;
                    }
                    else
                    {
                        $result['result'] = 0;
                    }
                    echo json_encode($result);
                }
        }

//  Проверка уникальности введенного email`a
        public function email()
        {
            $user_email = $this->input->post('email');

            $query = $this->signup_model->get_user_email($user_email);
                if (count($query) > 0)
                {
                    $result['result'] = 0;
                }
                else
                {
                    $result['result'] = 1;
                }
            echo json_encode($result);
        }

//  Подтверждение email`a
        public function confirm_email()
        {
            $query = $this->signup_model->confirm_email($this->input->get('email_hash'));
                if ($query === TRUE)
                {
                    echo "Email confirmed success";
                }
        }

//  Facebook авторизация
        public function fb_signup()
        {
            $user_data = $this->input->post();
            $email_query = $this->signup_model->uniqueness_email($user_data['email']);
                if ($email_query === FALSE)
                {
                    $query_data = $this->login_model->get_user_data($user_data['email']);
                    $session_data = array(
                        'gender' => $query_data[0]->gender,
                        'name' => $query_data[0]->name,
                        'lastname' => $query_data[0]->lastname,
                        'id' => $query_data[0]->id
                    );
                    $this->session->set_userdata($session_data);
                    $result['result'] = TRUE;

                    echo json_encode($result);
                }
                else
                {
                    unset($user_data['id']);
                    $user_data['name'] = $user_data['first_name'];
                    unset($user_data['first_name']);
                    $user_data['lastname'] = $user_data['last_name'];
                    unset($user_data['last_name']);
                    $user_data['register_date'] = time();
                    $user_data['social_network'] = 'facebook';
                    if ($user_data['gender'] == 'male')
                    {
                        $user_data['gender'] = 1;
                    }
                    elseif ($user_data['gender'] == 'female')
                    {
                        $user_data['gender'] = 2;
                    }
                    $result['result'] = $this->signup_model->insert_new_user_from_social_network($user_data);
                    $query_data = $this->login_model->get_user_data($user_data['email']);
                    $session_data = array(
                        'gender' => $query_data[0]->gender,
                        'name' => $query_data[0]->name,
                        'lastname' => $query_data[0]->lastname,
                        'id' => $query_data[0]->id
                    );
                    $this->session->set_userdata($session_data);

                    echo json_encode($result);
                }
        }

//  Google авторизация
        public function google_signup()
        {
            $user_data = $this->input->post();
//  Проверка уникальности пользователя
            $email_query = $this->signup_model->uniqueness_email($user_data['email']);
                if ($email_query === FALSE)
                {
                    $query_data = $this->login_model->get_user_data($user_data['email']);
                    $session_data = array(
                        'gender' => $query_data[0]->gender,
                        'name' => $query_data[0]->name,
                        'lastname' => $query_data[0]->lastname,
                        'id' => $query_data[0]->id
                    );
                    $this->session->set_userdata($session_data);
                    $result['result'] = TRUE;

                    echo json_encode($result);
                }
                else
                {
//  Запись нового пользователя
                    $name = explode(' ', $user_data['name']);
                    unset($user_data['name']);
                    $user_data['name'] = $name[0];
                    $user_data['lastname'] = $name[1];
                    $user_data['register_date'] = time();
                    $user_data['social_network'] = 'google';
                    $query['result'] = $this->signup_model->insert_new_user_from_social_network($user_data);

                    $query_data = $this->login_model->get_user_data($user_data['email']);
                    $session_data = array(
                        'gender' => $query_data[0]->gender,
                        'name' => $query_data[0]->name,
                        'lastname' => $query_data[0]->lastname,
                        'id' => $query_data[0]->id
                    );
                    $this->session->set_userdata($session_data);

                    echo json_encode($query);
                }

        }
    }