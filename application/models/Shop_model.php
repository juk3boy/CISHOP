<?php
defined('BASEPATH') or exit('No direct script access allowed');



class Shop_model extends MY_Model
{

    protected $table = 'product';
    protected $perPage = 2;

    public function index()
    {
    }
}
