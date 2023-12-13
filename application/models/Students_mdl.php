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

    public function get_students_info(){
        $sql="SELECT * FROM tbl_students";
        $query=$this->db->query($sql);
        if ($query->num_rows() > 0) {
        foreach ($query->result() as $row) {
            $data[] = $row;
            }
        }
        return $data;
    }

    public function delete($id)
    {
        $sql="DELETE FROM `tbl_students` WHERE `studentId` = $id";
        $query= $this->db->query($sql);
        // echo $this->db->last_query();die;
        if($this->db->affected_rows() > 0)
        {
            return true;
        }else{
            return false;
        }

    }
}

?>