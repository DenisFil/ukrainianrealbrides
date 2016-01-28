<?php
    class Personal_area extends CI_Controller
    {
        public function __construct()
        {
            parent::__construct();

            $this->load->model('user_interface/personal_area_model');
        }

        public function index()
        {
            $user_id = $this->session->userdata('id');

            $data['avatar'] = $this->personal_area_model->get_avatar($user_id);
            $photos = $this->personal_area_model->get_photos($user_id);
            $data['photo_count'] = count($photos);
            $data['new_messages'] = $this->personal_area_model->get_new_messages($user_id);
            $data['users_online'] = $this->personal_area_model->users_online(time());
            $data['credits'] = $this->personal_area_model->user_credits($user_id);
            $data['css'] = 'personal_area';
            $data['gender'] = '';
                if ($this->session->userdata('gender'))
                {
                    $data['gender'] = $this->session->userdata('gender');
                }

            $this->load->view('user_interface/header', $data);
            $this->load->view('user_interface/personal_area');
            $this->load->view('user_interface/footer');
        }

//Загрузка аватара
        public function loading_avatar()
        {
            //Загрузка фотографий
            $config = array(
                'upload' => array(
                    'upload_path' => './content/profiles/avatars',
                    'allowed_types' => 'jpg',
                    'remove_spaces' => TRUE,
                    'encrypt_name' => TRUE
                )
            );
            $this->load->library('upload', $config['upload']);
            $query = $this->upload->do_upload('avatar');
                if ($query === TRUE)
                {
                    $data = array('upload_data' => $this->upload->data());

                /************Изменение размера фото*************/
                    $config['image_lib'] = array(
                        'width' => array(
                            'image_library' => 'gd2',
                            'source_image' => './content/profiles/avatars/' . $data['upload_data']['file_name'],
                            'new_image' => './content/profiles/avatars/' . $data['upload_data']['raw_name'] . '_full.jpg',
                            'maintain_ratio' => TRUE,
                            'width' => '604'
                        ),
                        'height' => array(
                            'image_library' => 'gd2',
                            'source_image' => './content/profiles/avatars/' . $data['upload_data']['file_name'],
                            'new_image' => './content/profiles/avatars/' . $data['upload_data']['raw_name'] . '_full.jpg',
                            'maintain_ratio' => TRUE,
                            'height' => '604'
                        )
                    );

                //Загрузка библиотеки с конфигом в зависимости от размера исходного фото
                    if ($data['upload_data']['image_width'] > $data['upload_data']['image_height'])
                    {
                        $this->load->library('image_lib', $config['image_lib']['width']);
                    }
                    elseif ($data['upload_data']['image_height'] > $data['upload_data']['image_width'])
                    {
                        $this->load->library('image_lib', $config['image_lib']['height']);
                    }
                    $this->image_lib->resize();
                    unlink('./content/profiles/avatars/' . $data['upload_data']['file_name']);

                    //Сохранение фото
                    $photo_data = array(
                        'user_id' => $this->session->userdata('id'),
                        'avatar' => $data['upload_data']['raw_name']
                    );
                    $this->personal_area_model->add_avatar($photo_data);

                    $result['result'] = 1;
                    $result['link'] = base_url() . 'content/profiles/avatars/' . $data['upload_data']['raw_name'] . '_full.jpg';
                }
                else
                {
                    $result['result'] = 0;
                }
            echo json_encode($result);
        }
    }