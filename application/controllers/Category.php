<?php
defined('BASEPATH') or exit('No direct script access allowed');



class Category extends MY_Controller
{


    public function __construct()
    {
        parent::__construct();
        $role =  $this->session->userdata('role');
        if ($role != 'admin') {
            /** dibwah ini fungsi nya untuk menendang kembali ke halaman utama */
            redirect(base_url('/'));
            return;
        }
    }


    public function index($page = null)
    {
        $data['title']      = 'Admin: Category';
        $data['content']    = $this->category->paginate($page)->get();
        $data['total_rows'] = $this->category->count();
        $data['pagination'] = $this->category->makePagination(
            base_url('category'),
            2,
            $data['total_rows']
        );
        $data['page']       = 'pages/category/index';

        $this->view($data);
    }

    public function search($page = null)
    {
        if (isset($_POST['keyword'])) {
            $this->session->set_userdata('keyword', $this->input->post('keyword'));
        } else {
            redirect(base_url('category'));
        }

        $keyword = $this->session->userdata('keyword');

        $data['title']      = 'Admin: Category';
        $data['content']    = $this->category->like('title', $keyword)->paginate($page)->get();
        $data['total_rows'] = $this->category->like('title', $keyword)->count();
        $data['pagination'] = $this->category->makePagination(
            base_url('category/seacrh'),
            4,
            $data['total_rows']
        );
        $data['page']       = 'pages/category/index';
        $this->view($data);
    }


    public function reset()
    {
        $this->session->unset_userdata('keyword');
        redirect(base_url('category'));
    }


    public function create()
    {
        if (!$_POST) {
            $input = (object) $this->category->getDefaultValues();
        } else {
            $input = (object) $this->input->post(null, true);
        }

        if (!$this->category->validate()) {
            $data['title'] = 'Tambah Kategori';
            $data['input'] = $input;
            $data['form_action'] = base_url('category/create');
            $data['page'] = 'pages/category/form';

            $this->view($data);
            return;
            /** ini diberikan agar tidak diproses kebaris selanjutnya */
        }

        if ($this->category->create($input)) {
            $this->session->set_flashdata('success', 'Data Berhasil Disimpan !!!');
        } else {
            $this->session->set_flashdata('error', 'Oops !!!  Terjadi suatu kesalahan ');
        }

        redirect(base_url('category'));
    }

    /** edit($id) tuk $id dibawah didapat dari segment ke II dari suatu url */
    public function edit($id)
    {
        $data['content'] = $this->category->where('id', $id)->first();

        if (!$data['content']) {
            $this->session->set_flashdata('warning', 'Maaf!! Data tidak ditemukan');
            redirect(base_url('category'));
        }

        if (!$_POST) {
            $data['input'] = $data['content'];
        } else {
            $data['input'] = (object) $this->input->post(null, true);
        }

        if (!$this->category->validate()) {
            $data['title']          = 'Ubah Kategori';
            $data['form_action']    = base_url("category/edit/$id");
            $data['page']           = 'pages/category/form';

            $this->view($data);
            return;
            /** ini diberikan agar tidak diproses kebaris selanjutnya */
        }

        if ($this->category->where('id', $id)->update($data['input'])) {
            $this->session->set_flashdata('success', 'Data berhasil diperhabarui !!!');
        } else {
            $this->session->set_flashdata('error', 'Oops!!! Terjadi suatu kesalahan... ');
        }
        redirect(base_url('category'));
    }

    public function delete($id)
    {

        if (!$_POST) {
            redirect(base_url('category'));
        }

        if (!$this->category->where('id', $id)->first()) {
            $this->session->set_flashdata('warning', 'Maaf!!! Data tidak ditemukan...');
            redirect(base_url('category'));
        }

        if ($this->category->where('id', $id)->delete()) {
            $this->session->set_flashdata('success', 'Data sudah berhasil dihapus');
        } else {
            $this->session->set_flashdata('error', 'Oops!!! Terjadi suatu kesalahan... ');
        }
        redirect(base_url('category'));
    }


    public function unique_slug()
    {



        $slug = $this->input->post('slug');
        $id = $this->input->post('id');
        $category = $this->category->where('slug', $slug)->first();

        if ($category) {
            if ($id == $category->id) {
                return true;
            }
            $this->load->library('form_validation');
            $this->form_validation->set_message('unique_slug', '%s sudah digunakan');
            /** unique_slug di samping diambil dari nama methodnya */
            return false;
        }
        return true;
    }
}
