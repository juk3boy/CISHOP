<?php
defined('BASEPATH') or exit('No direct script access allowed');



class Register_model extends MY_Model
{

    /** protected : kita menggunakan encapsulation */
    protected $table = 'user';

    public function getDefaultValues()
    {

        /** dibawah ini harus sama dengan colom di tabel database kita */
        return [
            'name'          => '',
            'email'         => '',
            'password'      => '',
            'role'          => '',
            'is_active'     => ''
        ];
    }

    public function getValidationRules()
    {

        $validationRules = [
            /** Ini untuk Nama / Name */
            /** ini harus sama dengan colom di tabel database kita */
            [
                'field'     => 'name',
                'label'     => 'Nama',
                'rules'     => 'trim|required'
                // /** ini rules dr CI */
            ],

            // /** Ini untuk Email */
            [
                'field'     => 'email',
                'label'     => 'E-mail',
                /** is_unique[tabel.colom] */
                'rules'     => 'trim|required|valid_email|is_unique[user.email]',
                /** ini rules dr CI */
                'errors'    => [
                    'is_unique' => 'This %s already exists. !!!'
                ]
            ],

            /** Ini untuk password */
            [
                'field'     => 'password',
                /** ini harus sama dengan colom di tabel database kita */
                'label'     => 'Password',
                'rules'     => 'required|min_length[8]'
                /** ini rules dr CI */
            ],

            /** Ini untuk password confirmation */
            [
                'field'     => 'password_confirmation',
                /** ini harus sama dengan colom di tabel database kita */
                'label'     => 'Konfirmasi Password',
                'rules'     => 'required|matches[password]'
                /** ini rules dr CI */
            ]

        ];


        return $validationRules;
    }
    /** Akhir dari function getValidationRules() */


    public function run($input)
    {
        $data = [
            'name'        => $input->name,
            'email'       => strtolower($input->email),
            'password'    => hashEncrypt($input->password),
            'role'        => 'member'
        ];

        /** create($data) -> diambil dari model create yg sudah dibuat di MY_Model */
        $user = $this->create($data);

        /** variable user ($user) ini hanya menampilkan nilai baliknya saja */

        $sess_data = [
            'id'       => $user,
            'name'     => $data['name'],
            'email'    => $data['email'],
            'role'     => $data['role'],
            'is_login' => true
        ];

        $this->session->set_userdata($sess_data);
        return true;
    }
    /** Akhir dari function run($input) */
}
/** Akhir dari register_model */
