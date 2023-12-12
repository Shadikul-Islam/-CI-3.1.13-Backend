<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Students_mdl extends CI_Model{

    public function __construct(){
        parent::__construct();
        $this->load->database();
    }

    public function insert_students_info($data){
        $result = $this->db->insert('tbl_students', $data);
        // echo $this->db->last_query();die;
        return $result;
    }
}

?>