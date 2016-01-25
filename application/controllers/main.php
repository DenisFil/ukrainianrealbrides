<?php
require_once 'C:/OpenServer/domains/ukrainianrealbrides/application/third_party/Facebook/autoload.php';
    class Main extends CI_Controller
    {
        public function index()
        {
            $fb = new Facebook\Facebook([
                'app_id' => '427767240752729',
                'app_secret' => '38e3ede8c5b2b8ce1682536bcff55823',
                'default_graph_version' => 'v2.5'
            ]);

            $helper = $fb->getRedirectLoginHelper();
            $permissions = ['public_profile', 'email'];
            $facebook_login_url = $helper->getLoginUrl(base_url() . 'user_interface/signup/fbsignup', $permissions);

            $data['css'] = 'main';
            $data['gender'] = '';
            $data['facebook_login_url'] = $facebook_login_url;
                if ($this->session->userdata('gender'))
                {
                    $data['gender'] = $this->session->userdata('gender');
                }

            $this->load->view('user_interface/header', $data);
            $this->load->view('user_interface/main_page');
            $this->load->view('user_interface/footer');
        }
    }