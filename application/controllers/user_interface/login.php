<?php
    class Login extends CI_Controller
    {
        public function index()
        {
            $this->load->model('user_interface/login_model');
            $this->load->model('user_interface/main_model');

            $user_data = $this->input->post();
            $user_data['password'] = md5($user_data['password']);
            $query = $this->login_model->get_user_data($user_data['email']);
            $result = array();
                if (count($query) < 1)
                {
                    $result['result'] = 0;
                    $result['error'] = 'There is no user registered with that email address.';
                }
                else
                {
                    if ($query[0]->password == $user_data['password'])
                    {
                        $data = array(
                            'gender' => $query[0]->gender,
                            'name' => $query[0]->name,
                            'lastname' => $query[0]->lastname,
                            'id' => $query[0]->id
                        );
                        $this->session->set_userdata($data);

                        $this->main_model->set_online($query[0]->id);
                        $result['user_status'] = $this->main_model->get_profile_status($query[0]->id);

                        $result['result'] = 1;
                    }
                    else
                    {
                        $result['result'] = 0;
                        $result['error'] = 'The password you entered is incorrect.';
                    }
                }
            echo json_encode($result);
        }
    }