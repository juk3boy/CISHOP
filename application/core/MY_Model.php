<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Model extends CI_Model {

        protected $table = '';
        protected $perPage = 0;

        
        public function __construct()
        {
            parent::__construct();
            
            if (!$this->table) {
                $this->table = strtolower(
                            str_replace('_model', '', get_class($this))
                );
            }
        }
        

        /**
         * Fungsi Validasi Input
         * Rules: Dideklarasikan dalam masing-masing model
         * 
         * @return void
         */

        public function validate() 
        {
            $this->load->library('form_validation');

            $this->form_validation->set_error_delimiters(
                '<small class="form-text text-danger">', '</small>'
            ); 

            $validationRules = $this->getvalidationRules();

            $this->form_validation->set_rules($validationRules);

            return $this->form_validation->run();                                               
            
        }  /** penutup dari validate() */

            
           public function select($columns) 
           {
                $this->db->select($columns);
                return $this;
           } /** penutup dari select() */


           public function where($column, $condition) 
           {
               $this->db->where($column, $condition);
               return $this;
           }
           

           public function like($column, $condition) 
           {
               $this->db->like($column, $condition);
               return $this;
           }

           public function orLike($column, $condition) 
           {
                $this->db->or_like($column, $condition);
                return $this;
           }

           /** join tabel */       /** untuk type = left karna lebih banyak menggunakan left */
           public function join($table, $type = 'left') 
           {
                $this->db->join($table, "$this->table.id_$table = $table.id", $type);
                return $this;
           }

           public function orderBy($column, $order = 'asc') 
           {
               $this->db->order_by($column, $order);
               return $this;
           }

           /** ini jika kita ingin mengambil 1 baris saja pada database */
           public function first()
           {
               return $this->db->get($this->table)->row();
           }

           /** dibawah ini jika kita ingin mengambil banyak data sekaligus */
           public function get() 
           {
                return $this->db->get($this->table)->result();
           }

           /** fungsi count ini hanya menampilkan data dari jumlah yg sudah kita query  */
        public function count()
        {
            return $this->db->count_all_results($this->table);
        }

        public function create($data) 
        {
            $this->db->insert($this->table, $data);
            return $this->db->insert_id();  /** ini agar menghasilkan id yg melanjutkan yg sdh ada */
        }

        /**
         * Mengubah data yang ada pada suatu tabel dengan data baru
         * 
         * @param [type] $data
         * @return void
         */

        public function update($data) 
        {
            return $this->db->update($this->table, $data);
        }
        
        /**
         * Menghapus suatu data dari hasil query dan kondisi
         * 
         * @return void
         */
        public function delete() 
        {
            $this->db->delete($this->table);
            return $this->db->affected_rows();
        }

        /**
         * Menentukan limit data untuk ditampilkan 
         * 
         * @param [type] $page
         * @return void
         */

        public function paginate($page) 
        {
            $this->db->limit(
                $this->perPage,
                $this->calculateRealOffset($page)   /** fungsi ini utk pagination halaman selanjutnya */


            );
        }  /** penutup dari function paginate */

        /**
         * Menggantikan offset dengan nilai sesuai halam
         * 
         * @param [type] $page
         * @return void
         */
        public function calculateRealOffset($page) 
        {
            if (is_null($page) || empty ($page)) {
                $offset = 0;
            } else {
                $offset = ($page * $this->perPage) - $this->perpage;
            }

            return $offset;
        }  /** penutup dari function calculateRealOffset */

        /**
         * Membuat Pagination dengan style bootstrap 4
         * 
         * @param [type] $baseUrl
         * @param [type] $uriSegment
         * @param [type] $totalRows
         * @return void
         */
        public function makePagination($baseUrl, $uriSegment, $totalRows = null) {

            $this->load->library('pagination');

            $config = [
                        'base_url' => $baseUrl,
                        'uri_segment' => $uriSegment,
                        'per_page' => $this->perPage,
                        'total_rows' => $totalRows,
                        'use_page_numbers' => true,

                        /** dibawah ini tag untuk membuat pagination dari bootstrap pd ci */
                        'full_tag_open'     => '<ul class="pagination">',
                        'full_tag_close'    => '>/ul>',
                        'attributes'        => ['class' => 'page-link'],
                        'first_link'        => false,
                        'last_link'         => false,
                        'first_tag_open'    => '<li class="page-item">',
                        'first_tag_close'   => '</li>',
                        'prev_link'         => '&laquo',
                        'prev_tag_open'     => '<li class="page-item">',
                        'prev_tag_close'    => '</li>',
                        'next_link'         => '&raquo',
                        'next_tag_open'     => '<li class="page-item">',
                        'next_tag_close'    => '</li>',
                        'last_tag_open'     => '<li class="page-item">',
                        'last_tag_close'    => '</li>',
                        'cur_tag_open'      => '<li class="page-item active"><a href="#" class="page-link">',
                        'cur_tag_close'     => '<span class="sr-only">(current)</span></a></li>',
                        'num_tag_open'      => '<li class="page-item">',
                        'num_tag_close'     => '</li>',
                        
            ];

            $this->pagination->initialize($config);
            return $this->pagination->create_links();

        }   /** penutup dari makePagination */





            
}   /** class penutup MY_Model extends CI_Model */
        




