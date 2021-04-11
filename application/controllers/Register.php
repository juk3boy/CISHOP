
<?php

defined('BASEPATH') or exit('No direct script access allowed');



class Register extends MY_Controller
{


    public function __construct()
    {
        parent::__construct();
        $is_login   = $this->session->userdata('is_login');

        /** setelah itu kita harus validasi */

        if ($is_login) {

            redirect(base_url());
            /** ini diredirect ke halaman utama */
            return;
        }
    }


    public function index()
    {
        if (!$_POST) {
            $input = (object) $this->register->getDefaultValues();
        } else {
            $input = (object) $this->input->post(null, true);
        }

        /** ini memanggil model validate dr MY_Model */
        if (!$this->register->validate()) {
            $data['title'] = 'Register';
            $data['input'] = $input;
            /** ini diambil dari variable validsi diatas */
            $data['page'] = 'pages/auth/register';


            $this->view($data);
            return;
        }

        /** Setelah melewati proses validasi diatas maka kita akan membuat kondisi lagi */

        if ($this->register->run($input)) {

            $this->session->set_flashdata('success', 'Selamat Anda telah berhasil melakukan registrasi ...');
            redirect(base_url());
        } else {
            $this->session->set_flashdata('error', 'Oops maaf terjadi suatu kesalahan !!!');
            redirect(base_url('/register'));
            /** ini akan dikembalikan ke tampilan register kembali */
        }
    }
    /** Akhir dari function index() */
}
/** Akhir dari class register */
