<?php

class Sorry extends MY_Controller
{
    public function index()
    {
        $data['css'] = 'sorry';
        $this->load->view('user_interface/header', $data);
        $this->load->view('user_interface/sorry');
        $this->load->view('user_interface/footer');
    }

    public function email()
    {
        $data['user_id'] = $this->session->userdata('user_id');
        $data['email'] = $this->input->post('email');
        $this->load->model('user_interface/sorry_model');
        $query = $this->sorry_model->email($data);
        if ($query === TRUE) {
            $result['result'] = 1;
        } else {
            $result['result'] = 0;
        }
        echo json_encode($result);
    }
}