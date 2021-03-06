<?php

    function getDropdownList($table, $columns) {

        $CI     =& get_instance();
        $query  =  $CI->db->select($columns)->form($table)->get();  /** ini berfungsi untuk mengambil data dari database */


        if ($query->num_rows() >= 1) {
                    /** '' : value dr option  & '- Select -' ini yang akan muncul pada option select*/
            $option1 = ['' => '- Select -'];
            $option2 = array_column($query->result_array(), $columns[1], $columns[0]);
            $options = $option1 + $option2;

            return $options;

        }

        return $options = ['' => '- Select -'];
    }   /** penutut dari function getDropdownList */


    function getCategories() {
        $CI     =& get_instance();
                            /** get('category) -> mengambil dari tabel database */
        $query  = $CI->db->get('category')->result();

        return $query;

    } /** penutup dari getCategories() */

    function getCart() {
        $CI =& get_instance();

        $userId = $CI->session->userdata('id');
            if ($userId) {
                            $query = $CI->db->where('id_user', $userId)->count_all_results('cart');
                        }  

                return false;
            }  /** penutup dari getCart() */


            /** berikut untuk mengenkripsi password menggunakan hash dari php */

    function hashEncrypt($input) {

        $hash = password_hash($input, PASSWORD_DEFAULT);

        return $hash;
    }


    function hashEncryptVerify($input, $hash) {

        if (password_verify($input, $hash)) {

            return true;

        } else {

            return false;
            
        }
    }