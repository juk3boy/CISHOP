<?php
defined('BASEPATH') or exit('No direct script access allowed');



class Profile extends MY_Controller
{
    private $id;

    public function __construct()
    {
        parent::__construct();
        $is_login = $this->session->userdata('is_login');
        $this->id = $this->session->userdata('id');

        if (!$is_login) {
            redirect(base_url());
            return;
        }
    }


    public function index()
    {
        $data['title'] = 'Profile';
        $data['content'] = $this->profile->where('id', $this->id)->first();
        $data['page'] = 'pages/profile/index';



        return $this->view($data);
    }

    /** AWAL MENU EDIT */
    public function update($id)
    {
        $data['content'] = $this->profile->where('id', $id)->first();

        if (!$data['content']) {
            $this->session->set_flashdata('warning', 'Maaf, Data tidak ditemukan !!!');
            redirect(base_url('index.php/profile'));
        }

        if (!$_POST) {
            $data['input'] = $data['content'];
        } else {
            $data['input'] = (object) $this->input->post(null, true);
            /** JIka user masih ingin menggunakan password yang lama maka kita beri kondisi spt dibawah */
            if ($data['input']->password !== '') {
                $data['input']->password = hashEncrypt($data['input']->password);
            } else {
                /** mk kita panggin data content dan field password */
                $data['input']->password = $data['content']->password;
            }
        }

        /** Ini untuk pengecekan image apakah sudah ada atau belum */
        if (!empty($_FILES) && $_FILES['image']['name'] !== '') {
            $imageName = url_title($data['input']->name, '-', true) . '-' . date('YmdHis');
            $upload = $this->profile->uploadImage('image', $imageName);

            if ($upload) {

                if ($data['content']->image !== '') {
                    $this->profile->deleteImage($data['content']->image);
                }
                $data['input']->image = $upload['file_name'];
            } else {
                redirect(base_url("profile/update/$id"));
            }
        }

        if (!$this->profile->validate()) {
            $data['title']          = 'Ubah Data Profile';
            $data['form_action']    = base_url("profile/update/$id");
            $data['page']           = 'pages/profile/form';

            $this->view($data);
            return;
        }

        /** Informasi validasi berhasil / tidaknya */
        if ($this->profile->where('id', $id)->update($data['input'])) {
            $this->session->set_flashdata('success', 'Data berhasil disimpan !!');
        } else {
            $this->session->set_flashdata('error', 'Oops!!!  Terjadi suatu kesalahan ...');
        }

        redirect(base_url('profile'));
    }
    /** AKHIR MENU EDIT */


    public function unique_email()
    {

        $email = $this->input->post('email');
        $id = $this->input->post('id');
        $user = $this->profile->where('email', $email)->first();

        if ($user) {
            if ($id == $user->id) {
                return true;
            }
            $this->load->library('form_validation');
            $this->form_validation->set_message('unique_email', '%s sudah digunakan');
            /** unique_slug di samping diambil dari nama methodnya */
            return false;
        }
        return true;
    }
}
