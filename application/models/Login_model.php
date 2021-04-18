<?php
defined('BASEPATH') or exit('No direct script access allowed');



class Login_model extends MY_Model
{

    /** Jika nama tabel tidak sama dengan nama model maka kita harus mendeklarasikannya */

    protected $table = 'user';

    public function getDefaultValues()
    {
        return [
            'email'     => '',
            'password'  => ''

            /** ini dibuat 2 saja karena pd saat login hanya membutuhkan 2 saja */
        ];
    }

    public function getValidationRules()
    {
        $validationRules = [
            [
                'field' => 'email',
                'label' => 'E-Mail',
                'rules' => 'trim|required|valid_email'
            ],
            [
                'field' => 'password',
                'label' => 'Password',
                'rules' => 'required'
            ],
        ];
        return $validationRules;
    }

    public function run($input)
    {
        $query = $this->where('email', strtolower($input->email))
            ->where('is_active', 1)
            ->first();

        if (!empty($query) && hashEncryptVerify($input->password, $query->password)) {
            $sess_data = [
                'id'        => $query->id,
                'name'      => $query->name,
                'email'     => $query->email,
                'role'      => $query->role,
                'is_login'  => true
            ];

            $this->session->set_userdata($sess_data);

            return true;
            /** kita beri proses ini berhasil untuk return (nilai balik) */
        }
        return false;
    }
}
