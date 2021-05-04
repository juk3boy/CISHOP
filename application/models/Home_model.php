<?php
defined('BASEPATH') or exit('No direct script access allowed');



class Home_model extends MY_Model
{

    protected $table = 'product';
    protected $perPage  = 4;

    public function index()
    {
    }

    public function uploadImage($fieldName, $fileName)
    {
        $config =  [
            'upload_path'       => './assets/images/product',
            'file_name'         => $fileName,
            'allowed_types'      => 'jpg|gif|png|jpeg|JPG|PNG',
            'max_size'          => 1024,
            /** arti nya 1 MB */
            'max_width'         => 0,
            'max_height'        => 0,
            'overwrite'         => true,
            'file_ext_tolower'  => true,
            'x_axis'            => 40,
            'y_axis'            => 40
        ];
    }
}
