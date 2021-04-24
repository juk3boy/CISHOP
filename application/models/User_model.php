<?php
defined('BASEPATH') or exit('No direct script access allowed');



class User_model extends MY_Model
{

    /** karena nama model sama dengan tabel, maka kita tidak perlu mendeklarasikan kembali tabel nya */

    public function getDefaultValues()
    {
        return [
            'name'          => '',
            'email'         => '',
            'role'          => '',
            'is_active'     => ''
        ];
    }

    public function getValidationRules()
    {
        $validationRules = [
            [
                'field' => 'name',
                'label' => 'Nama',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'email',
                'label' => 'Email',
                'rules' => 'trim|required|valid_email|callback_unique_email'
            ],

            [
                'field' => 'role',
                'label' => 'Role',
                'rules' => 'required'
            ],
        ];

        return $validationRules;
    }

    public function uploadImage($fieldName, $fileName)
    {
        $config =  [
            'upload_path'        => './assets/images/user',
            'file_name'          => $fileName,
            'allowed_types'      => 'jpg|gif|png|jpeg|JPG|PNG',
            'max_size'           => 1024,
            /** arti nya 1 MB */
            'max_width'         => 0,
            'max_height'        => 0,
            'overwrite'         => true,
            'file_ext_tolower'  => true,
        ];

        $this->load->library('upload', $config);

        if ($this->upload->do_upload($fieldName)) {
            return $this->upload->data();
        } else {
            $this->session->set_flashdata('image_error', $this->upload->display_errors('', ''));
            return false;
        }
    }
    /** akhir dari function uploadImage */

    public function deleteImage($fileName)
    {

        if (file_exists("./assets/images/user/$fileName")) {
            unlink("./assets/images/user/$fileName");
        }
    }
}
