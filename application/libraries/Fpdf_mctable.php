<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Fpdf_mctable {
    public function __construct(){
		require_once  APPPATH . '/third_party/Mc_table.php';
		require_once  APPPATH . '/third_party/Fpdf.php';
		require_once  APPPATH . '/third_party/Fpdf_protection.php';
    }
}
?>