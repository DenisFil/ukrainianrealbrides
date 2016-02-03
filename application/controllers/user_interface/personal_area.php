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
            if ($this->session->userdata('id'))
            {
                $user_id = $this->session->userdata('id');

                $data['avatar'] = $this->personal_area_model->get_avatar($user_id);
                $photos['photos'] = $this->personal_area_model->get_photos($user_id);
                $photos['photos'] = array_reverse($photos['photos']);
                $data['photo_count'] = count($photos['photos']);
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
                $this->load->view('user_interface/personal_area', $photos);
                $this->load->view('user_interface/footer');
            }
        }

//Загрузка аватара
        public function loading_avatar()
        {
            $user_id = $this->session->userdata('id');
            $folder_name = './content/profiles/avatars/' . $user_id;
                if (file_exists($folder_name) === FALSE)
                {
                    mkdir($folder_name);
                }

            //Загрузка фотографий
            $config = array(
                'upload' => array(
                    'upload_path' => $folder_name,
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
                            'source_image' => './content/profiles/avatars/' . $user_id . '/' . $data['upload_data']['file_name'],
                            'new_image' => './content/profiles/avatars/' . $user_id . '/' . $data['upload_data']['raw_name'] . '_full.jpg',
                            'maintain_ratio' => TRUE,
                            'width' => '604'
                        ),
                        'height' => array(
                            'image_library' => 'gd2',
                            'source_image' => './content/profiles/avatars/' . $user_id . '/' . $data['upload_data']['file_name'],
                            'new_image' => './content/profiles/avatars/' . $user_id . '/' . $data['upload_data']['raw_name'] . '_full.jpg',
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
                    unlink('./content/profiles/avatars/' . $user_id . '/' . $data['upload_data']['file_name']);

                    //Сохранение фото
                    $photo_data = array(
                        'user_id' => $this->session->userdata('id'),
                        'avatar' => $data['upload_data']['raw_name']
                    );
                    $this->personal_area_model->add_avatar($photo_data);

                    $result['result'] = 1;
                    $result['link'] = base_url() . 'content/profiles/avatars/' . $user_id . '/' . $data['upload_data']['raw_name'] . '_full.jpg';
                    $this->image_lib->clear();
                }
                else
                {
                    $result['result'] = 0;
                }
            echo json_encode($result);
        }

//Кроп аватара
        public function crop_avatar()
        {
            $user_id = $this->session->userdata('id');
            $coordinates = $this->input->post();
            $link = $this->personal_area_model->get_avatar($this->session->userdata('id'));
            $coordinates = explode('; ', $coordinates['coordinates']);
            $coordinates_data = array();
                foreach ($coordinates as $value)
                {
                    $param = explode(': ', $value);
                    $param[2] = explode('px', $param[1]);
                    $coordinates_data[$param[0]] = $param[2][0];
                }
            $full = './content/profiles/avatars/' . $user_id . '/' . $link . '_full.jpg';
            $avatar = './content/profiles/avatars/' . $user_id . '/' . $link . '_avatar.jpg';
            copy($full, $avatar);
            $config['image_lib'] = array(
                'image_library' => 'gd2',
                'source_image' => './content/profiles/avatars/' . $user_id . '/' . $link . '_avatar.jpg',
                'maintain_ratio' => FALSE,
                'x_axis' => $coordinates_data['left'],
                'y_axis' => $coordinates_data['top'],
                'width' => $coordinates_data['width'],
                'height' => $coordinates_data['height']
            );
            $this->load->library('image_lib', $config['image_lib']);
            $this->image_lib->crop();
            $this->image_lib->clear();

            $preview = './content/profiles/avatars/' . $user_id . '/' . $link . '_preview.jpg';
            copy($avatar, $preview);

            echo json_encode($result = array('result' => 1, 'link' => base_url() . 'content/profiles/avatars/' . $user_id . '/' . $link . '_preview.jpg', 'width' => $coordinates_data['width']));
        }

//Кроп preview аватар
        public function crop_preview()
        {
            $user_id = $this->session->userdata('id');
            $coordinates = $this->input->post();
            $link = $this->personal_area_model->get_avatar($this->session->userdata('id'));
            $coordinates = explode('; ', $coordinates['coordinates']);
            $coordinates_data = array();
                foreach ($coordinates as $value)
                {
                    $param = explode(': ', $value);
                    $param[2] = explode('px', $param[1]);
                    $coordinates_data[$param[0]] = $param[2][0];
                }
            $config['image_lib'] = array(
                'image_library' => 'gd2',
                'source_image' => './content/profiles/avatars/' . $user_id . '/' . $link . '_preview.jpg',
                'maintain_ratio' => FALSE,
                'x_axis' => $coordinates_data['left'],
                'y_axis' => $coordinates_data['top'],
                'width' => $coordinates_data['width'],
                'height' => $coordinates_data['height']
            );
            $this->load->library('image_lib', $config['image_lib']);
            $x = $this->image_lib->crop();
            echo json_encode($result = array('result' => 1));
        }

//Загрузка фото
        public function loading_photo()
        {
            $user_id = $this->session->userdata('id');
            $folder_name = './content/profiles/photo/' . $user_id;
                if (file_exists($folder_name) === FALSE)
                {
                    mkdir($folder_name);
                }

            //Загрузка фотографий
            $config = array(
                'upload' => array(
                    'upload_path' => $folder_name,
                    'allowed_types' => 'jpg',
                    'remove_spaces' => TRUE,
                    'encrypt_name' => TRUE
                )
            );
            $this->load->library('upload', $config['upload']);
            $query = $this->upload->do_upload('photo');
                if ($query === TRUE)
                {
                    $data = array('upload_data' => $this->upload->data());

                    /************Изменение размера фото*************/
                    $config['image_lib'] = array(
                        'width' => array(
                            'image_library' => 'gd2',
                            'source_image' => './content/profiles/photo/' . $user_id . '/' . $data['upload_data']['file_name'],
                            'new_image' => './content/profiles/photo/' . $user_id . '/' . $data['upload_data']['raw_name'] . '_full.jpg',
                            'maintain_ratio' => TRUE,
                            'width' => '604'
                        ),
                        'height' => array(
                            'image_library' => 'gd2',
                            'source_image' => './content/profiles/photo/' . $user_id . '/' . $data['upload_data']['file_name'],
                            'new_image' => './content/profiles/photo/' . $user_id . '/' . $data['upload_data']['raw_name'] . '_full.jpg',
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
                    unlink('./content/profiles/photo/' . $user_id . '/' . $data['upload_data']['file_name']);

                    //Сохранение фото
                    $photo_data = array(
                        'user_id' => $this->session->userdata('id'),
                        'photo_link' => $data['upload_data']['raw_name']
                    );
                    $this->personal_area_model->add_photo($photo_data);

                    $result['result'] = 1;
                    $result['link'] = base_url() . 'content/profiles/photo/' . $user_id . '/' . $data['upload_data']['raw_name'] . '_full.jpg';
                    $result['photo_name'] = $data['upload_data']['raw_name'];
                    $this->image_lib->clear();
                }
                else
                {
                    $result['result'] = 0;
                }
            echo json_encode($result);
        }

//Кроп фото
        public function crop_photo()
        {
            $user_id = $this->session->userdata('id');
            $coordinates = $this->input->post();
            $link = $coordinates['link'];
            $coordinates = explode('; ', $coordinates['coordinates']);
            $coordinates_data = array();
            foreach ($coordinates as $value)
            {
                $param = explode(': ', $value);
                $param[2] = explode('px', $param[1]);
                $coordinates_data[$param[0]] = $param[2][0];
            }
            $full = './content/profiles/photo/' . $user_id . '/' . $link . '_full.jpg';
            $preview = './content/profiles/photo/' . $user_id . '/' . $link . '_preview.jpg';
            copy($full, $preview);
            $config['image_lib'] = array(
                'image_library' => 'gd2',
                'source_image' => './content/profiles/photo/' . $user_id . '/' . $link . '_preview.jpg',
                'maintain_ratio' => FALSE,
                'x_axis' => $coordinates_data['left'],
                'y_axis' => $coordinates_data['top'],
                'width' => $coordinates_data['width'],
                'height' => $coordinates_data['height']
            );
            $this->load->library('image_lib', $config['image_lib']);
            $this->image_lib->crop();
            $this->image_lib->clear();

            echo json_encode($result = array('result' => 1));
        }

//Приглашение друзей
        public function invite_friend()
        {
            $data = $this->input->post();

            $invite_data = array(
                'invite_code' => md5(time()),
                'invite_time' => time(),
                'invite_from_user' => $this->session->userdata('id')
            );

            $this->load->library('email');
            $this->email->from('info@ukrainianrealbrides.com', 'Ukrainian Real Brides');
            $this->email->to($data['email']);
            $this->email->subject('Invite from your friend.');
            $this->email->message('Hello,' . $data['name'] . '! Your friend ' . $this->session->userdata('name') . ' ' . $this->session->userdata('lastname') . ' invite you to project Ukrainian Real Brides. After Registration you will get bonus. Click on this link and join us: ' . base_url() . '?invite_code=' . $invite_data['invite_code'] . '&name=' . $data['name'] . '&email=' . $data['email']);
            $send = $this->email->send();

            $query = $this->personal_area_model->invite_friend($invite_data);
                if ($send == TRUE && $query == TRUE)
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