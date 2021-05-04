<?php
defined('BASEPATH') or exit('No direct script access allowed');



class Checkout extends MY_Controller
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

    /** fungsi dari param $input = null yaitu jika user menggunakan data kosong maka akan diarahkan ke $input yg terdapat getDefaultValues() */
    public function index($input = null)
    {
        /** agar kita dapat menggunakan table checkout maka kita akan melakukan overide spt dibwh */
        $this->checkout->table = 'cart';

        $data['cart'] = $this->checkout->select([
            'cart.id',
            'cart.qty',
            'cart.subtotal',
            'product.title',
            'product.image',
            'product.price',
        ])
            ->join('product')
            ->where('cart.id_user', $this->id)  //artinya cart id user harus sama dng yg dng id (ini didapat dari privat $id diatas) yg sedang login
            ->get();

        /** kita akan memvalidasi apakah ada data */

        if (!$data['cart']) {
            $this->session->set_flashdata('warning', 'Tidak ada produk didalam keranjang !!!');
            redirect(base_url('/'));
        }

        $data['input'] = $input ? $input : (object) $this->checkout->getDefaultValues();
        $data['title'] = 'Checkout';
        $data['page'] = 'pages/checkout/index';

        $this->view($data);
    }

    public function create()
    {
        if (!$_POST) {
            redirect(base_url('checkout'));
        } else {
            $input = (object) $this->input->post(null, true);
        }

        // Berikut utk memvalidasi inputan nya
        if (!$this->checkout->validate()) {
            /** $input didalam kurung itu didapat dari function index diatas */
            return $this->index($input);
        }

        $total = $this->db->select_sum('subtotal')
            ->where('id_user', $this->id)
            ->get('cart')
            ->row()
            ->subtotal;
        /** jika usah memasuki validasi diatas maka kita akan menyiapkan data karena diform checkout terdapat  invoice dsb */
        $data = [
            'id_user'   => $this->id,
            'date'      => date('Y-m-d'),
            'invoice'   => $this->id . date('Ymd'),
            'total'     => $total,
            'name'      => $input->name,
            'address'   => $input->address,
            'phone'     => $input->phone,
            'status'    => 'waiting'

        ];

        if ($order = $this->checkout->create($data)) {
            $cart = $this->db->where('id_user', $this->id)
                ->get('cart')->result_array();

            foreach ($cart as $row) {
                $row['id_orders']  = $order;
                unset($row['id'], $row['id_user']);
                /** fungsi unset yaitu untuk menghapus id & id_user yang ada ditabel yang mana kita tidak butuhkan karena sudah diwakili oleh tabel orders diatas */
                $this->db->insert('orders_detail', $row);
            }

            $this->db->delete('cart', ['id_user' => $this->id]);

            $this->session->set_flashdata('success', 'Data berhasil disimpan...');

            $data['title'] = 'Checkout Success';
            $data['content'] = (object) $data;
            $data['page'] = 'pages/checkout/success';

            $this->view($data);
        } else {
            $this->session->set_flashdata('error', 'Oops!! Terjadi suatu kesalahan');
            return $this->index($input);
        }
    }
}
