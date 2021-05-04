<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Checkout_model extends MY_Model
{

    public $table = 'orders';

    public function getDefaultValues()
    {
        return [
            // 'id_user'   => '',  /** ini akan dibuat otomatis */
            // 'invoice'   => '',  /** ini akan dibuat otomatis */
            'name'      => '',
            'address'   => '',
            'phone'     => '',
            'status'    => ''
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
                'field' => 'address',
                'label' => 'Alamat',
                'rules' => 'trim|required'

            ],

            [
                'field' => 'name',
                'label' => 'Nama',
                'rules' => 'trim|required'

            ],

            [
                'field' => 'phone',
                'label' => 'Telephone',
                'rules' => 'trim|required|max_length[15]'

            ],
        ];

        return $validationRules;
    }
}

/* End of file ModelName.php */
