<?php defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('input_rekening')) {
    function input_rekening($kode_rekening, $baru, $id) {
        return $baru ? "<input id='rek$id' type='text' name='kode_rekening' value='' />" : $kode_rekening."<input id='rek$id' type='hidden' name='kode_rekening' value='$kode_rekening' />";
    }
}

/*
 * EoF: datatable_formatter_helper.php
 * File Location: ./application/helpers/datatable_formatter_helper.php
 */