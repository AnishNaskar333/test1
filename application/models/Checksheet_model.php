<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Checksheet_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    /*********** Insert with last inserted id **************/
    public function insertWithLastInsertedId($tableName = "", $data = []) {

        $inserted = $this->db->insert($tableName, $data);
        if ($inserted) {
            return $this->db->insert_id();
        } else {
            return false;
        }
    }

    /********* Insert query **********/
    public function insert($tableName = "", $data = []) {

        $inserted = $this->db->insert($tableName, $data);
        if ($inserted) {
            return true;
        } else {
            return false;
        }
    }
}
