<?php
defined('BASEPATH') or exit('No direct script access allowed');



class Myorder extends MY_Controller
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

        $data['title'] = 'Daftar Order';
        $data['content'] = $this->myorder->where('id_user', $this->id)
            ->orderBy('date', 'DESC')->get();
        $data['total_rows'] = $this->myorder->count();
        $data['pagination'] = $this->myorder->makePagination(
            base_url('myorder'),
            2,
            $data['total_rows']
        );
        $data['page'] = 'pages/myorder/index';

        $this->view($data);
    }

    public function detail($invoice)
    {
        $data['order'] = $this->myorder->where('invoice', $invoice)->first();

        /** kita akan memvaliadasi apakah sudah ada data dari order diatas */
        /** jika didalam $data['oder'] kosong maka kita akan redirect ke halaman myorder */
        if (!$data['order']) {
            $this->session->set_flashdata('warning', 'Maaf !! Data tidak ditemukan...');
            redirect(base_url('/myorder'));
        }

        /** dibawah ini kita melakukan override kembali */
        $this->myorder->table = 'orders_detail';
        $data['order_detail'] = $this->myorder->select([
            'orders_detail.id_orders',
            'orders_detail.id_product',
            'orders_detail.qty',
            'orders_detail.subtotal',
            'product.title',
            'product.image',
            'product.price'
        ])
            ->join('product')
            ->where('orders_detail.id_orders', $data['order']->id)
            ->get();
        $data['page'] = 'pages/myorder/detail';

        $this->view($data);
    }

    public function confirm($invoice)
    {


        $data['order'] = $this->myorder->where('invoice', $invoice)->first();

        /** kita akan memvaliadasi apakah sudah ada data dari order diatas */
        /** jika didalam $data['oder'] kosong maka kita akan redirect ke halaman myorder */
        if (!$data['order']) {
            $this->session->set_flashdata('warning', 'Maaf !! Data tidak ditemukan...');
            redirect(base_url('/myorder'));
        }

        if ($data['order']->status !== 'waiting') {
            /** jika true kta akn membuat flash massage nya */
            $this->session->set_flashdata('warning', 'Bukti Transfer sudah dikirim');
            redirect(base_url("myorder/detail/$invoice"));
        }

        if (!$_POST) {
            $data['input'] = (object) $this->myorder->getDefaultValues();
        } else {
            $data['input'] = (object) $this->input->post(null, true);
        }

        if (!empty($_FILES) && $_FILES['image']['name'] !== '') {

            /** kenapa menggunana $invoice krn kita akan sesuaikan dng invoice dan gmbrnya */
            $imageName = url_title($invoice, '-', true) . '-' . date('YmdHis');
            $upload = $this->myorder->uploadImage('image', $imageName);

            if ($upload) {
                $data['input']->image = $upload['file_name'];
            } else {
                redirect(base_url("myorder/confirm/$invoice"));
            }
        }

        if (!$this->myorder->validate()) {
            $data['title']          = 'Konfirmasi Order';
            $data['form_action']    = base_url("myorder/confirm/$invoice");
            $data['page']           = 'pages/myorder/confirm';

            $this->view($data);
            return;
        }

        /** dibawah ini mengoverride tabel dr model mya order */
        $this->myorder->table = 'orders_confirm';
        // unset($data['input']->invoice);  // ini tujuannya agar kita tidak menginput invoce karene tidak ada field invoice

        if ($this->myorder->create($data['input'])) {
            $this->myorder->table = 'orders';
            $this->myorder->where('id', $data['input']->id_orders)->update(['status' => 'paid']);
            $this->session->set_flashdata('success', 'Data berhasil disimpan !!');
        } else {
            $this->session->set_flashdata('error', 'Oops!!!  Terjadi suatu kesalahan ...');
        }

        redirect(base_url("myorder/detail/$invoice"));
    }

    public function image_required()
    {
        if (empty($_FILES) || $_FILES['image']['name'] === '') {
            $this->session->set_flashdata('image_error', 'Bukti transfer tidak boleh kosong !!');
            return false;  // fungsi ini agar tidak melanjutkan proses lainnya
        } else {
            return true; // fungsi ini akan melanjutkan ke proses selanjutnya
        }
    }
}
