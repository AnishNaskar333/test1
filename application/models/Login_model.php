<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function checkUser($email= '', $password= '') {

        $this->db->where('email', $email);
        $this->db->where('password', $password);
        $query = $this->db->get('admin_login');
        if($query->num_rows() != 0){

            return $query->row();
        } else {

            return false;
        }
    }
}
