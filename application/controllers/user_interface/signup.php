<?php
    class Signup extends CI_Controller
    {
        public function __construct()
        {
            parent::__construct();

            $this->load->model('user_interface/signup_model');
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
    }